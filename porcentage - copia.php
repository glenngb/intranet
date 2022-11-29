<?php
session_start();
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');

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
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blank Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home-iniciomalo</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
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
        <h3 class="card-title">Title</h3>

        <div class="card-tools">

        </div>
      </div>
      <div class="card-body">


        <div id="top_x_div" style="width: 200; height: 250px;"></div>

        <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>

        <div class="col-md-12 col-md-offset-12">
        <hr />
      </div>


        <div class="container-fluid">
          <div class="row">
            <div class= "col-md-10 col-md-offset-10" ><!-- GRAFICO VENTAS vs proyectdao <div id="chart_div"></div>  -->
              <div id="chart_div" class="chart"></div>
            </div> 
            <div class="col-2 "><!-- Card %"></div>  -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo "45 %" ?>

                </div>
                <div class="icon">
                  <i class="fas fa-percentage"></i>
                </div>
                <a href="ventas-acumuladas.php" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="col-md-6 col-md-offset-6">
        <hr />
      </div>
      <div class="clearfix"></div>
      <div class="col-md-6">
        <div id="chart_div" class="chart"></div>
      </div>


      <div class="col-lg-3 col-6">
        <!-- small card -->

        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo "45" ?>

              <p>Venta Mes</p>

          </div>
          <div class="icon">
            <i class="fas fa-percentage"></i>
          </div>
          <a href="ventas-acumuladas.php" class="small-box-footer">
            Mas información <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    packages: ['corechart', 'bar']
  });
  google.charts.setOnLoadCallback(drawStuff);
  google.charts.setOnLoadCallback(drawMultSeries);


  function drawStuff() {
    var data = new google.visualization.arrayToDataTable([
      ['Opening Move', 'Percentage'],
      <?php
      while ($row = $porcentage->fetch_assoc()) {
        echo "['" . "% Ventas" . "'," . $row["total"] . "],";
      }
      ?>
    ]);

    var options = {
      title: 'Chess opening moves',
      width: 500,
      height: 200,
      legend: {
        position: 'none'
      },
      chart: {
        title: '% Ventas Mes',
        //subtitle: 'popularity by percentage' 
      },
      bars: 'horizontal', // Required for Material Bar Charts.
      axes: {
        x: {
          0: {
            side: 'top',
            label: '%'
          } // Top x-axis.
        }
      },
      bar: {
        groupWidth: "90%"
      }
    };

    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
    chart.draw(data, options);
  }

  //Inicio Grafico proyectado mes VS acumulado mes

  function drawMultSeries() {
    var data = google.visualization.arrayToDataTable([
      ['City', 'Proyectado Mes', 'Acumulado Mes'],
      /*  ['New York City, NY', 8175000, 8008000]*/

      <?php
      while ($row = $acumproyect->fetch_assoc()) {
        echo "['" . "% Ventas" . "'," . $row["proyectado"] . "," . $row["actual"] . "],";
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
</script>