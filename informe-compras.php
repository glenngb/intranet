<?php
session_start(); // se agrega para subir al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
?>
<?php
include_once('includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 
$where = "";

if (!empty($_POST)) //condicion para buscar
{
    $valor = $_POST['numero'];
    if (!empty($valor)) {
        $where = "WHERE a.numero LIKE '%$valor%'"; //  con el % busca los valores en la tabla que contenga alguna coincidencia, se puede modificar -- en este caso busca por el nombre, se puede modificar para que sea en otro campo
    }

    //fin condicion para buscar
}
$sql = "SELECT 
    a.numero, a.articulo, a.cantidad, a.costo_unitario, a.costo_total, b.nombre,a.estado, a.fecha_creacion,a.fecha_anulacion
FROM
    compra AS a
        INNER JOIN
  proveedor AS b  ON a.id_proveedor = b.id order by numero "; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Compras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Compras</li>
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
                <h3 class="card-title"><i class="fas fa-money-check-alt nav-icon"></i> Compras

                    <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                            "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        var f = new Date();
                        document.write(meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>

                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="row table-responsive">
                    <!-- tabla que muestra la consulta -->
                    <table id="compras" class="table table-striped table-bordered" style="width:100%">
                        <!-- para el autofiltro de la tabla -->

                        <thead>
                            <!-- Encabezado de la tabla -->
                            <tr>
                                <th>
                                    <center>N°</center>
                                </th>
                                <th>
                                    <center>Articulo</center>
                                </th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>
                                    <center>Costo unitario $</center>
                                </th>
                                <th>
                                    <center>Costo total $</center>
                                </th>
                                <th>
                                    <center>Proveedor</center>
                                </th>
                                <th>
                                    <center>Estado</center>
                                </th>
                                <th>
                                    <center>Fecha de ingreso</center>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                <!-- Recorre todos los resultados de nuestra consulta -->
                                <tr>
                                    <!-- imprime los resultados en pantalla -->

                                    <td>
                                        <center><?php echo $row['numero']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['articulo']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['cantidad']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo number_format($row['costo_unitario'], 0, '$', '.'); ?>
                                    </td><!-- separador de miles -->
                                    <td>
                                        <center><?php echo number_format($row['costo_total'], 0, '$', '.'); ?>
                                    </td>
                                    <td>
                                        <center><?php echo $row['nombre']; ?></center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php if ($row['estado'] == "ANULADA") { 
                                              echo "<span class='badge bg-warning text-dark'><blink><font color='#ff0000'><b>" . $row['estado'] . "</b></font></blink></span>";
                                                $date = date_create($row['fecha_anulacion']);
                                                echo "<br><blink><font color='#ff0000'>" . date_format($date, 'd/m/Y H:i:s') . "</font></blink>";
                                            } ?>
                                        </center>
                                    </td>

                                    <td>
                                        <center><?php
                                                $date = date_create($row['fecha_creacion']);
                                                echo date_format($date, 'd/m/Y H:i:s'); ?></center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a class="link" href="reportes/compras.php" target="_blank"> <i class="fas fa-print"></i> Imprimir</a>
                </div>
            </div>
            <!-- END Datatables -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Compras
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
include_once('templates/footer.php');
?>