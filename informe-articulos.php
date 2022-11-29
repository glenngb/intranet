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
  $valor = $_POST['campo'];
  if(!empty($valor)){
    $where = "WHERE articulo LIKE '%$valor%'"; //  con el % busca los valores en la tabla que contenga alguna coincidencia, se puede modificar -- en este caso busca por el nombre, se puede modificar para que sea en otro campo
  }
  
  //fin condicion para buscar
}
$sql = "SELECT * FROM articulo $where   "; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);


$sql =  "SELECT count(*) AS numarticulos FROM punto_venta.articulo;";
$cuentaarticulos= $coneccion->query($sql);
?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Artículos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home-iniciomalo</a></li>
              <li class="breadcrumb-item active">Blank Page</li>-->
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
          <h3 class="card-title">   <?php while ($row = $cuentaarticulos->fetch_array(MYSQLI_ASSOC)) { ?>
            <i class="far fa-list-alt nav-icon"></i>
                <h3 class="card-title"></h3> </i> &nbsp;&nbsp; <?php echo $row['numarticulos'] . " Artículos"; ?></H6><?php } ?></h3>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">
          <!-- Datatables -->
          <table id="articulos" class="table table-striped table-bordered" style="width:100%">
      <thead> <!-- Encabezado de la tabla -->
        <tr>
          <th><center>Articulo</center></th>
          <th><center>Descripción</center></th>
          <th><center>Precio venta $ </center></th>
          <th><center>Costo $ </center></th>
          <th><center>Fecha de ingreso </center></th>
        </tr>
      </thead>
      
      <tbody>
        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>  <!-- Recorre todos los resultados de nuestra consulta -->
          <tr> <!-- imprime los resultados en pantalla -->
            <td><center><?php echo $row['articulo']; ?></center></td>
            <td><center><?php echo $row['descripcion']; ?></center></td>
            <td><center><?php echo number_format($row['precio_venta'], 0,'$', '.');?></td><!-- separador de miles --> 
            <td><center><?php echo number_format($row['precio_costo'], 0,'$', '.');?></td><!-- separador de miles --> 
            <td><center><?php 
            $date = date_create($row['fecha_ingreso']); 
            echo date_format($date, 'd/m/Y H:i:s'); ?></center></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <a class="link" href="reportes/articulos.php" target="_blank"> <i class="fas fa-print"></i> Imprimir</a>
  </div>
</div>
<!-- END Datatables -->

        </div>
         <!-- /.card-body -->
         <div class="card-footer">
                        Footer
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
