<?php
session_start(); // se agrega para subir al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');  //conexion a la bd


//Grafico venta general
$result =  $coneccion->query("SELECT 
v.numero_local as local, SUM(v.precio_total) as total
FROM
venta AS v
    INNER JOIN
local l ON v.numero_local = l.numero
WHERE
DATE(fecha_venta) = DATE(CURRENT_DATE())
GROUP BY numero_local
ORDER BY l.grupo , l.lugar");

//Grafico venta por hora
$ventxhora =  $coneccion->query("SELECT 
HOUR(fecha_venta) AS hora, SUM(precio_total) AS venta
FROM
punto_venta.venta
WHERE
DATE(fecha_venta) = DATE(CURDATE())
GROUP BY HOUR(fecha_venta)");

//Cuenta locales que han realizado ventas en dia actual
$sql =  "SELECT 
COUNT(DISTINCT (numero_local)) AS numerolocales
FROM
punto_venta.venta
WHERE
DATE(fecha_venta) = DATE(CURDATE());";
$cuentalocales = $coneccion->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!--  <h1>Sales</h1>-->
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
        <h3 class="card-title">Ventas en tiempo real</h3>
        
    <div class="card-tools">

        </div>
      </div>
      <div class="card-body">
        <!-- grafico ventas -->


        <!--<div id="columnchart_values"></div> -->

      </div>
      <!-- grafico en card primary -->
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="card card-primary">
            <div class="card-header">
              <?php while ($row = $cuentalocales->fetch_array(MYSQLI_ASSOC)) { ?>
                <span class="spinner-grow spinner-grow-sm"></span><h3 class="card-title"></h3> </i> &nbsp;&nbsp; <?php echo $row['numerolocales'] . " Locales"; ?></H6><?php } ?></button>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div id="columnchart_values" class="chart"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- / grafico en card primary -->
      <!-- /.card-body -->

      <!-- COMIENZO CUADROS -->
      <div class="row">
        <div class="col-lg-3 col-6">


          <!-- small card -->
          <?php $sql = "SELECT sum(precio_total) FROM venta  where DATE(fecha_venta) = DATE(CURRENT_DATE()) and estado = 1";
          $ventames = $coneccion->query($sql); ?>
          <?php while ($row = $ventames->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo number_format($row['sum(precio_total)'], 0, '$', '.'); ?></h3><?php } ?>

              <!--  <p>Venta día</p> -->

              </div>
              <div class="icon">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <a href="#" class="small-box-footer">
                Venta día <i class="fas fa-sync fa-spin"></i>
              </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small card -->
          <?php
          $sql = "SELECT sum(precio_total) FROM venta  where DATE(fecha_venta) = DATE(CURRENT_DATE()) and estado = 2";
          $margendia = $coneccion->query($sql); ?>
          <?php while ($row = $margendia->fetch_array(MYSQLI_ASSOC)) { ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo number_format($row['sum(precio_total)'], 0, '$', '.'); ?></h3><?php } ?>

              <!-- <p>Margen Mes</p>-->
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
              </div>
              <a href="#" class="small-box-footer">
                NC día <i class="fas fa-sync fa-spin"></i>
              </a>
            </div>
        </div>
      </div>
    </div>
    <!-- ./col -->

    <!-- TERMINO CUADROS -->
    <div class="card-footer">
      Esta página se actualiza automáticamente cada 5 minutos | Última actualización <?php
                                                                                      $hora = date("d-m-Y H:i:s");
                                                                                      echo "$hora" . "\n"; ?> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:document.location.reload()" class="btn btn-sm btn-info btn-flat pull-left">Actualizar ahora</a>
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
<!--  grafico ventas -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Local', 'Ventas'],
      <?php
      while ($row = $result->fetch_assoc()) {
        echo "['" . $row["local"] . "'," . $row["total"] . "],";
      }
      ?>
    ]);

    var options = {
      // title: 'Ventas por local',
      width: '100%',
      height: '100%',
      vAxis: {
        title: '$'
      },
      hAxis: {
        title: 'Locales'
      },
      bar: {
        groupWidth: '88%'
      },
      is3D: false
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(data, options);
  }
  $(window).resize(function() {
    drawChart();
  });
</script>


<script type="text/javascript">
  function actualizar() {
    location.reload(true);
  }
  //Función para actualizar cada 5 minutos (300000 milisegundos)
  setInterval("actualizar()", 300000);
</script>


<script>
  //para mensaje de página actualizada
  toastr["success"]("Información actualizada!")


  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-full-width",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
</script>