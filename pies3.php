<?php
session_start(); // se agrega para subor al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');

include_once('includes/bd_coneccion.php');

// $grafpie = $coneccion->query("SELECT sum(precio_total) as a FROM punto_venta.venta where month (fecha_venta)= month(curdate())");







$acumproyect =  $coneccion->query("SELECT 
SUM(venta.precio_total) as actual ,proyeccion.total_proyeccion as proyectado
FROM
venta,
proyeccion
WHERE
MONTH(fecha_venta) = MONTH(NOW())");





//$tortadia =  $coneccion->query("SELECT sum(precio_total)  as tortadia FROM punto_venta.venta where DAY (fecha_venta)= DAY(curdate())AND month (fecha_venta)= month(curdate())");

$tortadia =  $coneccion->query("SELECT 
SUM(precio_total) AS tortadia, dia_semana, monto_proyeccion as monto_dia_t
FROM
punto_venta.venta,
punto_venta.proyeccion_dia
WHERE
DAY(fecha_venta) = DAY(CURDATE())
    AND MONTH(fecha_venta) = MONTH(CURDATE())
    AND dia = DAY(NOW())");



//Venta dia
$ventadia =  $coneccion->query("SELECT sum(precio_total)  as ventadia FROM punto_venta.venta where DAY (fecha_venta)= DAY(curdate())AND month (fecha_venta)= month(curdate())");


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
     
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card ">

    <!-- Boton Ventas por local -->
    <div class="d-flex justify-content-end">
                 <h3 class="card-title">   <a href="sales.php" class="btn btn-sm btn-primary">
                 <i class="fas fa-chart-line"></i> Ventas por local
                    </a>
                    <div class="container">
                </h3> </a>
                </div>
    <!-- Fin Boton Ventas por local -->
      <div class="card-header">
        
       
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-header">Proyectado VS Acumulado Mes
</h5>
                  <p class="card-text">
                  <div id="chart_div" style="width: 790px; height: 500px; max-height: 100%; max-width: 100%;"></div>
                  </p>

                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-header">Proyectado día VS Acumulado día</h5>
                  <p class="card-text">
                  <div id="chart_div2" style="width: 790px; height: 500px; max-height: 100%; max-width: 100%;"></div>
                  </p>

                </div>
              </div>
            </div>
          </div>
       
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
     
      </div>
      
</div>

</div>
</div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php
include_once('templates/footer.php');
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart', 'bar']
  });

  google.charts.setOnLoadCallback(drawMultSeries);

  function drawMultSeries() {
    var data = google.visualization.arrayToDataTable([
      ['City', 'Proyectado Mes', 'Acumulado Mes'],
      /*  ['New York City, NY', 8175000, 8008000]*/

      <?php
      while ($row = $acumproyect->fetch_assoc()) {
        echo "['" . "Ventas" . "'," . $row["proyectado"] . "," . $row["actual"] . "],";
      }
      ?>

    ]);

    var options = {
      title: '',
      chartArea: {
        width: '70%',
        height: '500px'
      },
      hAxis: {
        // title: 'Total Population',
        minValue: 0
      },
      vAxis: {
        //title: 'City'
      }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }

  $(window).resize(function() {
    drawMultSeries();

  });



  google.charts.setOnLoadCallback(drawMultSeries2);

  function drawMultSeries2() {
    var data = google.visualization.arrayToDataTable([
      ['City', 'Proyectado día', 'Acumulado día'],
      /*  ['New York City, NY', 8175000, 8008000]*/

      <?php
      while ($row = $tortadia->fetch_assoc()) {
        echo "['" . "Ventas" . "'," . $row["monto_dia_t"] . "," . $row["tortadia"] . "],";
      }
      ?>

    ]);

    var options = {
      title: '',
      chartArea: {
        width: '70%',
        height: '500px'
      },
      hAxis: {
        // title: 'Total Population',
        minValue: 0
      },
      vAxis: {
        //title: 'City'
      }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
    chart.draw(data, options);
  }

  $(window).resize(function() {
    drawMultSeries2();

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