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
a.numero_local,  max(b.desde) as desde, max(b.hasta) as hasta,  max(numero), max(b.hasta) - max(a.numero) as quedan
FROM
venta AS a
    INNER JOIN
rango_boleta AS b  ON a.numero_local = b.numero_local group by numero_local"  ; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Folios restantes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Folios restantes</li>
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
                <h3 class="card-title"><i class="fa fa-hourglass-half" aria-hidden="true"></i>
                    Folios restantes
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
                                    <center>N° local</center>
                                </th>
                                <th>
                                    <center>N° Desde</center>
                                </th>
                                <th>
                                    <center>N° Hasta</center>
                                </th>
                                <th>
                                    <center>Ultima boleta</center>
                                </th>
                                <th>
                                    <center>Restan</center>
                                </th>
                               
                                
                            </tr>
                        </thead>

                        <tbody>
                        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>  <!-- Recorre todos los resultados de nuestra consulta -->
							<tr> <!-- imprime los resultados en pantalla -->
							
								<td><center><?php echo $row['numero_local']; ?></center></td>
								<td><center><?php echo $row['desde']; ?></center></td>
								<td><center><?php echo $row['hasta']; ?></center></td>
								<td><center><?php echo $row['max(numero)']; ?></center></td>
								
								<td><center>
								
								<?php 
								
								if ($row['quedan'] > 1000) {
									echo number_format ($row['quedan'], 0,'$', ','); 
									} else {
									 
									  echo "<blink><font color='#ff0000'><b>".number_format($row['quedan'], 0,'$', '.')."</b></font></blink>";
								 }
								
										?></center>
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
            Folios restantes
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