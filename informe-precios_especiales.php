<?php
session_start(); // se agrega para subir al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 

$sql = "SELECT articulo,precio_venta, precio_especial1 FROM punto_venta.articulo WHERE precio_venta <> precio_especial1 order by articulo asc;"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);

$sql = "SELECT 
GROUP_CONCAT(numero
    SEPARATOR '-') AS locales
FROM
punto_venta.local
WHERE
lista_precio = 'precio especial 1';"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultados = $coneccion->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Precios especiales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Precios especiales</li>
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
        <h3 class="card-title">

          <?php
          $localesPreciosEspeciales = 0;
          while ($row = $resultados->fetch_array(MYSQLI_ASSOC))
            if ($row['locales'] > $localesPreciosEspeciales) {
              echo "<blink><font color='#00E511'> <i class='fas fa-check'></font></blink></i>" . ' Locales con precios especiales: ' . $row['locales'];
            } else {
              echo "<blink><font color='#ff0000'> <i class='fas fa-times'></b></font></blink></i>" . ' No hay locales con precios especiales ';
            } ?>
        </h3>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">

        <!-- Datatables -->
        <div class="row table-responsive">
          <!-- tabla que muestra la consulta -->
          <table id="compras" class="table table-striped table-bordered" style="width:100%">

            <thead>
              <!-- Encabezado de la tabla -->
              <tr>
                <th style="width:15%;">
                  <center>Artículo</center>
                </th>
                <th style="width:15%;">
                  <center>Precio estandar $</center>
                </th>
                <th style="width:15%;">
                  <center>Precio especial $</center>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <!-- Recorre todos los resultados de nuestra consulta -->
                <tr>
                  <!-- imprime los resultados en pantalla -->

                  <td>
                    <center><?php echo $row['articulo']; ?></center>
                  </td>
                  <td>
                    <center><?php echo number_format($row['precio_venta'], 0, '$', '.'); ?></center>
                  </td><!-- separador de miles -->
                  <td>
                    <center><?php echo number_format($row['precio_especial1'], 0, '$', '.'); ?></center>
                  </td><!-- separador de miles -->
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
include_once('templates/footer.php');
?>