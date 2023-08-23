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
$sql = "SELECT * FROM intranet.directorio order by nombre asc"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Directorio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Directorio CM</li>
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
                <h3 class="card-title"><i class="fas fa-user-tie nav-icon"></i>  Directorio CM

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
                                    <center>Nombre</center>
                                </th>
                                <th>
                                    <center>Teléfono</center>
                                </th>
                                <th>
                                    <center>Correo</center>
                                </th>
                                <th>
                                    <center>Cargo</center>
                                </th>
                             
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                <!-- Recorre todos los resultados de nuestra consulta -->
                                <tr>
                                    <!-- imprime los resultados en pantalla -->

                                    <td>
                                        <center><?php echo $row['nombre']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['telefono']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['correo']; ?></center>
                                    </td>

                                    <td>
                                        <center><?php echo $row['cargo']; ?></center>
                                    </td>
                                    

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                  <!-- BOTON IMPRIMIR  <a class="link" href="#" target="_blank"> <i class="fas fa-print"></i> Imprimir</a>-->
                </div>
            </div>
            <!-- END Datatables -->
        </div>
        <!-- /.card-body -->
        <!--  <div class="card-footer">
            Compras
        </div>-->
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