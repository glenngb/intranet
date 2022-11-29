<?php
session_start(); // se agrega para subir al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd -

$sql = "SELECT 
numero_local,
numero,
fecha_venta,
precio_total,
cantidad_pares,
referencia,
observacion
FROM
punto_venta.nota_credito
WHERE
MONTH(fecha_venta) = MONTH(CURDATE())
    AND devolucion = 1"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>NC Devolución</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home-NC Devolución</a></li>
                        <li class="breadcrumb-item active">NC Devolución</li>
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
                <h3 class="card-title">NC Devolución


                    <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        var f = new Date();
                        document.write(meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>

                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">

                <div class="card-body">
                    <div class="row table-responsive">
                        <!-- tabla que muestra la consulta -->
                        <table id="nc" class="table table-striped table-bordered" style="width:100%">
                            <!-- para el autofiltro de la tabla -->

                            <thead>
                                <!-- Encabezado de la tabla -->
                                <tr>
                                <th></th>
                                    <th>
                                        <center>Local</center>
                                    </th>
                                    <th>
                                        <center>N° NC</center>
                                    </th>
                                    <th>
                                        <center>Fecha</center>
                                    </th>
                                    <th>
                                        <center>Total $</center>
                                    </th>
                                    <th>
                                        <center>Cant.</center>
                                    </th>
                                    <th>
                                        <center>referencia</center>
                                    </th>
                                    <th>
                                        <center>Observación</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>


                                <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>

                                    


                                    <!-- Recorre todos los resultados de nuestra consulta -->
                                    <tr>
                                        <!-- imprime los resultados en pantalla -->
                                        <td></td>
                                        <td>
                                            <center><?php echo $row['numero_local']; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $row['numero']; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $row['fecha_venta']; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo number_format($row['precio_total'], 0, '$', '.'); ?>
                                        </td>
                                        <td>
                                            <center><?php echo $row['cantidad_pares']; ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $row['referencia']; ?></center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $row['observacion']; ?></center>
                                        </td>
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
                NC Devolución
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