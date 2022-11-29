<?php
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');


$result =  $coneccion->query("SELECT fecha_venta, sum(precio_total) FROM punto_venta.venta WHERE MONTH(fecha_venta) = MONTH(CURDATE()) GROUP BY DATE(fecha_venta) ");


$grafpie = $coneccion->query("SELECT 
articulo, SUM(MARGEN) AS margen
FROM
punto_venta.detalle_venta
WHERE
DATE(fecha_de_venta) > DATE_SUB(NOW(), INTERVAL 7 DAY)
    AND cantidad != 0
    AND numero_venta NOT IN (SELECT 
        IFNULL(boleta, 0)
    FROM
        vale)
GROUP BY articulo
ORDER BY margen DESC
LIMIT 10");

$sql =  "SELECT count(*) as cantidad FROM punto_venta.articulo;";
$cantarticulos = $coneccion->query($sql);

?>





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Bienvenidos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
           <!--  <li class="breadcrumb-item"><a href="#">Home-iniciomalo</a></li>
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
        <h3 class="card-title">Dashboard</h3>

        <div class="card-tools">

        </div>
      </div>
      <div class="card-body">
        <!-- Small Box (Stat card) -->
        <!--<h5 class="mb-2 mt-4">Small Box</h5> -->
        <div class="row">
          <div class="col-lg-3 col-6">


            <!-- small card -->
            <?php $sql = "SELECT sum(precio_total) FROM punto_venta.venta  where MONTH(fecha_venta) = MONTH(CURRENT_DATE())";
            $ventames = $coneccion->query($sql); ?>
            <?php while ($row = $ventames->fetch_array(MYSQLI_ASSOC)) { ?>
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo number_format($row['sum(precio_total)'], 0, '$', '.'); ?></h3><?php } ?>

                <p>Venta Mes</p>

                </div>
                <div class="icon">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="ventas-acumuladas.php" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
            $sql = " SELECT 
    SUM(margen)
FROM
    punto_venta.detalle_venta
WHERE
     MONTH(fecha_de_venta) = MONTH(CURRENT_DATE())
        AND numero_venta NOT IN (SELECT 
            IFNULL(boleta, 0)
        FROM
            vale)";
            $margendia = $coneccion->query($sql); ?>
            <?php while ($row = $margendia->fetch_array(MYSQLI_ASSOC)) { ?>
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo number_format($row['SUM(margen)'], 0, '$', '.'); ?></h3><?php } ?>

                <p>Margen Mes</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php while ($row = $cantarticulos->fetch_array(MYSQLI_ASSOC)) { ?>
              
                <h3><?php echo number_format($row['cantidad'], 0, '$', '.'); ?></h3><?php } ?>

                <p>Cantidad de Articulos</p>
              </div>
              <div class="icon">
              <i class="fas fa-list-alt"></i>
            
              </div>
              <a href="informe-articulos.php" class="small-box-footer">
                Mas información <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php $sql = "SELECT count(distinct articulo) AS negativo FROM punto_venta.detalle_venta  where margen < 0";
            $margennegativo = $coneccion->query($sql); ?>
            <?php while ($row = $margennegativo->fetch_array(MYSQLI_ASSOC)) { ?>
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo number_format($row['negativo'], 0, '$', '.'); ?></h3><?php } ?>

                <p>Artículos Margen Negativo</p>
                </div>
                <div class="icon">
                  <i class="fas fa-sort-amount-down"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#ModalArticulosNegativos">
                  Mas información <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
          <!-- ./col -->
          <!-- LINE CHART -->
          <div class="col-lg-6 col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ventas</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="linechart">

                  <canvas id="linechart" style="min-height: 350px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- / LINE CHART -->
          <!-- PIE CHART -->
          <div class="col-lg-6 col-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ARTICULOS TOP 10 MARGEN</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="piechart">

                  <canvas id="linechart" style="min-height: 350px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- / PIE CHART -->

        </div>
        <!-- /.row -->

      </div>
      <!-- /.card-body -->
      <!-- Custom tabs (Charts with tabs)-->


<div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->

      <!-- The Modal -->
      <div class="modal fade" id="ModalArticulosNegativos">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Artículos margen negativo</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <?php $sql =  "SELECT  GROUP_CONCAT(DISTINCT articulo order by articulo SEPARATOR ' - ') AS articuloneg FROM punto_venta.detalle_venta  WHERE margen < 0";

            $artnegativo = $coneccion->query($sql); ?>
            <?php while ($row = $artnegativo->fetch_array(MYSQLI_ASSOC)) { ?>

              <div class="modal-body">
              
                <?php 
                echo $row['articuloneg']; ?> <?php } ?>



              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>

          </div>
        </div>
      </div>

    </div>

    <!-- / The Modal -->

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
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(grafMargen);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Employee Name', 'VENTAS'],
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $date = date_create($row['fecha_venta']);
          echo "['"  . date_format($date, 'd-m-Y ') . "', " . $row['sum(precio_total)'] . "],";
        }
      }
      ?>
    ]);

    var options = {
      //title: 'Ventas Cokase',
      width: 690,
      //height: 580,
      legend: {
        position: 'bottom'
      }
    };

    var chart = new google.visualization.LineChart(document.getElementById('linechart'));

    chart.draw(data, options);
  }

  // Fin Grafico ventas


  //grafico margen articulos

  function grafMargen() {

var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  <?php

  while ($row = $grafpie->fetch_assoc()) {
    echo "['" . $row["articulo"] . "'," . $row["margen"] . "],";
  }

  ?>
]);

var options = {
  //  title: 'Gender Count',
  //  width: 500,
  // height: 500,
  is3D: true
};

var chart = new google.visualization.PieChart(document.getElementById('piechart'));

chart.draw(data, options);
}
</script>










<!--   -->