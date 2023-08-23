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
$sql = "SELECT * FROM intranet.directorio_local;"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Directorio Sucursales</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Sucursales</li>
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
        <h3 class="card-title"><i class="fas fa-store"></i> Sucursales</h3>

        <div class="card-tools">

        </div>
      </div>
      <div class="card-body">

      <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
   Ver directorio
  </a>
 
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   <!-- CONTENIDO DE LA TABLA -->

   <div class="row table-responsive">
                    <!-- tabla que muestra la consulta -->
                    <table id="compras" class="table table-striped table-bordered" style="width:100%">
                        <!-- para el autofiltro de la tabla -->

                        <thead>
                            <!-- Encabezado de la tabla -->
                            <tr>
                                <th>
                                    <center>L</center>
                                </th>
                                <th>
                                    <center>Formato</center>
                                </th>
                                <th>
                                    <center>Ciudad</center>
                                </th>
                                <th>
                                    <center>Dirección</center>
                                </th>
                                <th>
                                    <center>Jéfe de local</center>
                                </th>
                                <th>
                                    <center>Sub-jéfe</center>
                                </th>
                                <th>
                                    <center>Correo</center>
                                </th>
                             
                            </tr>
                        </thead>

                        <tbody>


                        <?php
function obtenerClaseColor($formato) {
    switch ($formato) {
        case 'COKASE':
            return 'color-morado';
        case 'MAS':
            return 'color-amarillo';
        case 'PASARELA':
            return 'color-pink';
        default:
            return '';
    }
}
?>
                            <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                <!-- Recorre todos los resultados de nuestra consulta -->
                                <tr>
                                    <!-- imprime los resultados en pantalla -->

                                    <td>
                                        <center><?php echo $row['local']; ?></center>
                                    </td>
                                    <td class="<?php echo obtenerClaseColor($row['formato']); ?>">
    <center><?php echo $row['formato']; ?></center>
</td>

                                    <td>
                                        <center><?php echo $row['ciudad']; ?></center>
                                    </td>

                                    <td>
                                        <center><?php echo $row['direccion']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['jefe_local']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['subjefe']; ?></center>
                                    </td>
                                    <td>
                                        <center><?php echo $row['correo']; ?></center>
                                    </td>
                                  

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                  <!-- BOTON IMPRIMIR  <a class="link" href="#" target="_blank"> <i class="fas fa-print"></i> Imprimir</a>-->
               


  <!-- FIN CONTENIDO DE LA TABLA -->


  </div>
</div>

        <iframe src="https://www.google.com/maps/d/embed?mid=1uqXyQ7YegaEeTp8_vXNHT6jXkAct_vcF" width="100%" height="800"></iframe>
      </div>


      
      
      <!-- /.card-body -->
      <div class="card-footer">
        Maps
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