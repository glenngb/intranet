<?php 
session_start();// se agrega para subir al hosting
include_once ('templates/header.php');
include_once ('templates/barra-superior.php');
include_once ('templates/navegacion-lateral.php');
?>
	<?php
include_once('includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 
$where = "";

	if(!empty($_POST)) //condicion para buscar
	{
		$valor = $_POST['numero'];
		if(!empty($valor)){
			$where = "WHERE a.numero LIKE '%$valor%'"; //  con el % busca los valores en la tabla que contenga alguna coincidencia, se puede modificar -- en este caso busca por el nombre, se puede modificar para que sea en otro campo
		}
		
		//fin condicion para buscar
	}
	$sql = "SELECT 
  local,
  numero_venta,
  articulo,
  cantidad,
  precio_total,
  fecha_de_venta
FROM
  punto_venta.detalle_venta where month(fecha_de_venta) = month(curdate()) and articulo >= 900"  ; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
	$resultado = $coneccion->query($sql);
?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Venta Saldos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Venta Saldos</li>
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
          <h3 class="card-title">Venta Saldos | Artículos <small><b>Desde:</b> 900 <b>Hasta:</b> 999</small> | actualizado al
          <script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();
document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
</script>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <div class="row table-responsive">   <!-- tabla que muestra la consulta -->
				<table  id="saldos" class="table table-striped table-bordered" style="width:100%"> <!-- para el autofiltro de la tabla -->

       
					<thead> <!-- Encabezado de la tabla -->
						<tr>
							<th><center>Local</center></th>
							<th><center>Boleta</center></th>
							<th><center>Articulo</center></th>
							<th><center>Cantidad </center></th>
							<th><center>Precio Total $ </center></th>
							<th><center>Fecha </center></th>
			
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>  <!-- Recorre todos los resultados de nuestra consulta -->
							<tr> <!-- imprime los resultados en pantalla -->
							
								<td><center><?php echo $row['local']; ?></center></td>
								<td><center><?php echo $row['numero_venta']; ?></center></td>
								<td><center><?php echo $row['articulo']; ?></center></td>
                <td><center><?php echo $row['cantidad']; ?></center></td>
								<td><center><?php echo number_format($row['precio_total'], 0,'$', ',');?></td><!-- separador de miles --> 
								<td><center><?php 
								$date = date_create($row['fecha_de_venta']); 
								echo date_format($date, 'd/m/Y H:i:s'); ?></center></td>
								 
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
    <!-- END Datatables -->
        </div>
         <!-- /.card-body -->
         <div class="card-footer">
        

<script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();
document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
</script>

                    </div>
                    <!-- /.card-footer-->
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