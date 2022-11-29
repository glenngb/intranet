<?php
session_start(); // se agrega para subor al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');

include_once('includes/bd_coneccion.php');

// $grafpie = $coneccion->query("SELECT sum(precio_total) as a FROM punto_venta.venta where month (fecha_venta)= month(curdate())");


$grafpie = $coneccion->query("SELECT sum(precio_total) as precio   FROM punto_venta.venta where DAY (fecha_venta)= DAY(curdate())AND month (fecha_venta)= month(curdate())");

$porcentage =  $coneccion->query("SELECT 
FORMAT(SUM(venta.precio_total) / proyeccion.total_proyeccion * 100,
    2) AS total
FROM
venta,
proyeccion
WHERE
MONTH(fecha_venta) = MONTH(NOW())");



$acumproyect =  $coneccion->query("SELECT 
SUM(venta.precio_total) as actual ,proyeccion.total_proyeccion as proyectado
FROM
venta,
proyeccion
WHERE
MONTH(fecha_venta) = MONTH(NOW())");



$tortames =  $coneccion->query("SELECT 
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




//Cuenta locales que han realizado ventas en dia actual
$sql =  "SELECT 
COUNT(DISTINCT (numero_local)) AS numerolocales
FROM
punto_venta.venta
WHERE
DATE(fecha_venta) = DATE(CURDATE());";
$cuentalocales = $coneccion->query($sql);
?>


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">


        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card ">

      <div class="card-header">

        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header">Venta día</h5>
                <p class="card-text">
                <div id="piechartdia" style="width: 790px; height: 500px; max-height: 100%; max-width: 100%;"></div>
                </p>

              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-header">Venta mes</h5>
                <p class="card-text">
                <div id="piechart" style="width: 790px; height: 500px; max-height: 100%; max-width: 100%;"></div>
                </p>

              </div>
            </div>
          </div>
        </div>
        <div class="card-tools">
        </div>
      </div>
      <div class="card-body">
        <div class="container">
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

                <!-- <p> NC dia</p>-->
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



    </div>
    <div class="card-footer">
      Esta página se actualiza automáticamente cada 5 minutos | Última actualización <?php
                                                                                      $hora = date("d-m-Y H:i:s");
                                                                                      echo "$hora" . "\n"; ?> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:document.location.reload()" class="btn btn-sm btn-info btn-flat pull-left">Actualizar ahora</a>
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
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      <?php

      while ($row = $tortames->fetch_assoc()) {
        echo "['Proyectado'," . $row["proyectado"] . "],
            ['Actual'," . $row["actual"] . "],";
      }

      ?>
    ]);

    var options = {
      //  title: 'Ventas Mes',
      is3D: true
    };




    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  };


  // piedia
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(piedia);

  function piedia() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      <?php

      while ($row = $tortadia->fetch_assoc()) {
        echo "['Proyectado'," . $row["monto_dia_t"] . "],
            ['Actual'," . $row["tortadia"] . "],";
      }

      ?>

    ]);

    var options = {
      // title: 'Ventas día',
      is3D: true
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartdia'));

    chart.draw(data, options);
  }
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
      title: 'Proyectado VS Acumulado Mes',
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
      while ($row = $ventadia->fetch_assoc()) {
        echo "['" . "Ventas" . "'," . $row["monto_dia_t"] . "," . $row["ventadia"] . "],";
      }
      ?>

    ]);

    var options = {
      title: 'Proyectado día VS Acumulado día',
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