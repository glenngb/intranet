<?php
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');
?>
<?php $sql = "SELECT 
    fecha_reporte,
    IFNULL(locales.numero, 0) AS numero_local,
   
    IFNULL(locales.capital_real, 0) AS capital_real,
    IFNULL(acumulada.venta_acumulada, 0) + IFNULL((SELECT 
                    SUM(va.costo_total)
                FROM
                    vale va
                WHERE
                    va.numero_local = locales.numero
                        AND tipo_vale = 1
                        AND boleta IS NULL
                        AND MONTH(va.fecha_ingreso) = MONTH(fecha_reporte)
                        AND YEAR(va.fecha_ingreso) = YEAR(fecha_reporte)),
            0) AS venta_acumulada_mes,
    IFNULL(((IFNULL(venta_mes.precio_total, 0) - IFNULL(venta_mes.descuento, 0)) * 100) / (IFNULL((SELECT 
                            SUM(precio_total)
                        FROM
                            venta
                        WHERE
                            MONTH(fecha_venta) = MONTH(fecha_reporte)
                                AND YEAR(fecha_venta) = YEAR(fecha_reporte)),
                    0) + IFNULL((SELECT 
                            SUM(va.costo_total)
                        FROM
                            vale va
                        WHERE
                            tipo_vale = 1 AND boleta IS NULL
                                AND MONTH(va.fecha_ingreso) = MONTH(fecha_reporte)
                                AND YEAR(va.fecha_ingreso) = YEAR(fecha_reporte)),
                    0)),
            0) AS porcentaje_venta,
    IFNULL((SELECT 
                    SUM(margen)
                FROM
                    detalle_venta dv
                WHERE
                    dv.local = locales.numero
                        AND MONTH(dv.fecha_de_venta) = MONTH(fecha_reporte)
                        AND YEAR(dv.fecha_de_venta) = YEAR(fecha_reporte)
                        AND numero_venta NOT IN (SELECT 
                            IFNULL(boleta, 0)
                        FROM
                            vale)),
            0) AS margen,
    IFNULL((SELECT 
                    SUM(monto_gasto) AS gastos
                FROM
                    gasto_local
                WHERE
                    numero_local = locales.numero
                        AND MONTH(mes_proyeccion) = MONTH(fecha_reporte)
                        AND YEAR(mes_proyeccion) = YEAR(fecha_reporte)),
            0) AS gastos,
    grupo,
    lugar
FROM
    (SELECT 
        DATE('2020/07/10') fecha_reporte,
            l.numero,
            SUM(cantidad) AS cantidad,
            ROUND(SUM(cantidad * precio_costo)) AS capital_real,
            grupo,
            lugar
    FROM
        local l
    LEFT OUTER JOIN stock_local s ON l.numero = s.numero_local
    LEFT OUTER JOIN articulo a ON s.articulo = a.articulo
    GROUP BY numero_local
    ORDER BY grupo , lugar) locales
        LEFT OUTER JOIN
    (SELECT 
        SUM(v.cantidad_pares) venta,
            SUM(v.precio_total) precio_total,
            SUM(v.descuento) descuento,
            v.numero_local,
            v.fecha_venta
    FROM
        venta v
    GROUP BY v.numero_local , DATE(fecha_venta)) venta ON fecha_reporte = DATE(venta.fecha_venta)
        AND locales.numero = venta.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(cantidad) cant, dv.fecha_de_venta, dv.local
    FROM
        detalle_venta dv
    GROUP BY dv.local , DATE(fecha_de_venta)) dventa ON fecha_reporte = DATE(dventa.fecha_de_venta)
        AND locales.numero = dventa.local
        LEFT OUTER JOIN
    (SELECT 
        (SUM(margen)) margen_diario, fecha_de_venta, local
    FROM
        detalle_venta dv
    WHERE
        numero_venta NOT IN (SELECT 
                IFNULL(boleta, 0)
            FROM
                vale)
    GROUP BY dv.local , DATE(fecha_de_venta)) margen ON fecha_reporte = DATE(margen.fecha_de_venta)
        AND locales.numero = margen.local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dva_.cantidad) vale_,
            va_.numero_local,
            va_.fecha_ingreso
    FROM
        vale va_
    INNER JOIN detalle_vale dva_ ON va_.numero = dva_.numero_vale
        AND DATE(va_.fecha_ingreso) = DATE(dva_.fecha_ingreso)
        AND va_.tipo_vale IN (1 , 2)
        AND dva_.accion = 1
        AND va_.boleta IS NULL
    GROUP BY va_.numero_local , DATE(va_.fecha_ingreso)) vale_ ON fecha_reporte = DATE(vale_.fecha_ingreso)
        AND locales.numero = vale_.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dva_.cantidad) vale_nega,
            val_.numero_local,
            val_.fecha_ingreso
    FROM
        vale val_
    INNER JOIN detalle_vale dva_ ON val_.numero = dva_.numero_vale
        AND DATE(val_.fecha_ingreso) = DATE(dva_.fecha_ingreso)
        AND val_.tipo_vale = 1
        AND dva_.accion = 0
        AND val_.boleta = 0
    GROUP BY val_.numero_local , DATE(val_.fecha_ingreso)) valenega_ ON fecha_reporte = DATE(valenega_.fecha_ingreso)
        AND locales.numero = valenega_.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dva_.cantidad) vale_negg,
            valm.numero_local,
            valm.fecha_ingreso
    FROM
        vale valm
    INNER JOIN detalle_vale dva_ ON valm.numero = dva_.numero_vale
        AND MONTH(valm.fecha_ingreso) = MONTH(dva_.fecha_ingreso)
        AND valm.tipo_vale = 1
        AND dva_.accion = 0
        AND valm.boleta = 0
    GROUP BY valm.numero_local , MONTH(valm.fecha_ingreso)) valeneg_ ON MONTH(fecha_reporte) = MONTH(valeneg_.fecha_ingreso)
        AND locales.numero = valeneg_.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dva.cantidad) vale, va.numero_local, va.fecha_ingreso
    FROM
        vale va
    INNER JOIN detalle_vale dva ON va.numero = dva.numero_vale
        AND DATE(va.fecha_ingreso) = DATE(dva.fecha_ingreso)
        AND va.tipo_vale IN (1)
        AND dva.accion = 0
        AND va.boleta IS NULL
    GROUP BY va.numero_local , DATE(va.fecha_ingreso)) vale ON fecha_reporte = DATE(vale.fecha_ingreso)
        AND locales.numero = vale.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(precio_total) venta_acumulada,
            numero_local,
            MONTH(fecha_venta) mes,
            YEAR(fecha_venta) ano
    FROM
        venta
    GROUP BY numero_local , MONTH(fecha_venta) , YEAR(fecha_venta)) acumulada ON MONTH(fecha_reporte) = acumulada.mes
        AND YEAR(fecha_reporte) = acumulada.ano
        AND locales.numero = acumulada.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dv.cantidad) venta,
            SUM(dv.precio_total) precio_total,
            SUM(dv.descuento) descuento,
            SUM(dv.cantidad * dv.precio_costo) costo_venta,
            v.numero_local,
            YEAR(v.fecha_venta) ano,
            MONTH(v.fecha_venta) mes
    FROM
        venta v
    INNER JOIN (SELECT 
        dv.*, (a.precio_costo) precio_costo
    FROM
        detalle_venta dv
    LEFT OUTER JOIN articulo a ON dv.articulo = a.articulo
        AND a.estado = 1) dv ON numero = numero_venta
    GROUP BY v.numero_local , YEAR(v.fecha_venta) , MONTH(v.fecha_venta)) venta_mes ON MONTH(fecha_reporte) = venta_mes.mes
        AND YEAR(fecha_reporte) = venta_mes.ano
        AND locales.numero = venta_mes.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dva_.cantidad) vale_,
            va_.numero_local,
            SUM(dva_.cantidad * precio_costo_vale_) costo_venta_vale_,
            YEAR(va_.fecha_ingreso) ano,
            MONTH(va_.fecha_ingreso) mes
    FROM
        vale va_
    INNER JOIN (SELECT 
        dva_.*, (a.precio_costo) precio_costo_vale_
    FROM
        detalle_vale dva_
    LEFT OUTER JOIN articulo a ON dva_.articulo = a.articulo
        AND a.estado = 1) dva_ ON va_.numero = dva_.numero_vale
        AND DATE(va_.fecha_ingreso) = DATE(dva_.fecha_ingreso)
        AND va_.tipo_vale IN (1 , 2)
        AND dva_.accion = 1
        AND va_.boleta IS NULL
    GROUP BY va_.numero_local , YEAR(va_.fecha_ingreso) , MONTH(va_.fecha_ingreso)) vale_mes_ ON MONTH(fecha_reporte) = vale_mes_.mes
        AND YEAR(fecha_reporte) = vale_mes_.ano
        AND locales.numero = vale_mes_.numero_local
        LEFT OUTER JOIN
    (SELECT 
        SUM(dva.cantidad) vale,
            va.numero_local,
            SUM(dva.cantidad * precio_costo_vale) costo_venta_vale,
            YEAR(va.fecha_ingreso) ano,
            MONTH(va.fecha_ingreso) mes
    FROM
        vale va
    INNER JOIN (SELECT 
        dva.*, (a.precio_costo) precio_costo_vale
    FROM
        detalle_vale dva
    LEFT OUTER JOIN articulo a ON dva.articulo = a.articulo
        AND a.estado = 1) dva ON va.numero = dva.numero_vale
        AND DATE(va.fecha_ingreso) = DATE(dva.fecha_ingreso)
        AND va.tipo_vale IN (1)
        AND dva.accion = 0
        AND va.boleta IS NULL
    GROUP BY va.numero_local , YEAR(va.fecha_ingreso) , MONTH(va.fecha_ingreso)) vale_mes ON MONTH(fecha_reporte) = vale_mes.mes
        AND YEAR(fecha_reporte) = vale_mes.ano
        AND locales.numero = vale_mes.numero_local

        ORDER BY venta_acumulada_mes DESC";
$ventames = $coneccion->query($sql); 
?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home-iniciomalo</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ventas Acumuladas</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <div class="table table-sm">   <!-- tabla que muestra la consulta -->
        <table class="display" id="mitabla" style="width:45%"> <!-- para el autofiltro de la tabla -->
        
            
					<thead> <!-- Encabezado de la tabla -->
						<tr>
							<th><center>N° Local</center></th>
							<th><center>Capital</center></th>
							<th><center>Venta Acumulada</center></th>
							<th><center>Margen Mes </center></th>
						
						
						</tr>
					</thead>
					
					<tbody>
          <?php while ($row = $ventames->fetch_array(MYSQLI_ASSOC)) { ?>  <!-- Recorre todos los resultados de nuestra consulta -->
							<tr> <!-- imprime los resultados en pantalla -->
							
                <td><center><?php echo $row['numero_local']; ?></center></td>
                <td><center><?php echo number_format($row['capital_real'], 0,'$', '.');?></center></td><!-- separador de miles --> 
                <td><center><?php echo number_format($row['venta_acumulada_mes'], 0,'$', '.');?></center></td><!-- separador de miles --> 
                <td><center><?php echo number_format($row['margen'], 0,'$', '.');?></center></td><!-- separador de miles --> 
            </tr>
            <?php } ?>
            
					</tbody>
				</table>
			</div>
		</div>
    <!-- END Datatables -->

        </div>
         <!-- /.card-body -->
         
                </div>
                <!-- /.card -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <?php   
      include_once ('templates/footer.php');
  ?>
 
  