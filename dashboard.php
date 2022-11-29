<?php
session_start();
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



$grafartmasvendidos = $coneccion->query("SELECT 
articulo, SUM(cantidad) AS total
FROM
punto_venta.detalle_venta
WHERE
DATE(fecha_de_venta) > DATE_SUB(NOW(), INTERVAL 7 DAY)
GROUP BY articulo
ORDER BY total DESC
LIMIT 7");

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

<body>HOLA</body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!--  <div class="col-sm-6">
          <h1>Bienvenidos</h1>
        </div>-->
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
                <h3 class="card-title">Dashboard
                    <div class="container">
                </h3>
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

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo '7' ?></h3>

                                <p>Artículos Mas vendidos</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-star"></i>
                            </div>
                            <a href="#" class="small-box-footer" data-toggle="modal"
                                data-target="#ModalArticulosmasvendidos">
                                Mas información <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Inicio card proyectado vs acumulado -->
                    <div class="col-lg-12 col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Proyectado VS Acumulado</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Inicio grafico proyectado vs acumulado -->

                                <div class="col-md-12 col-md-offset-12">
                                    <hr />
                                </div>


                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-10">
                                            <!-- GRAFICO VENTAS vs proyectdao <div id="chart_div"></div>  -->
                                            <div id="chart_div" class="chart"></div>
                                        </div>
                                        <div class="col-2 align-self-end ">

                                            <!-- Card %"></div>  -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <!--  <h3><?php echo "45 %" ?> -->
                                                    <?php while ($row = $porcentage->fetch_array(MYSQLI_ASSOC)) { ?>
                                                    <h1><?php echo $row['total']; ?>%</h1><?php } ?>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-percentage fa-xs"></i>

                                                </div>
                                                <a href="ventas-acumuladas.php" class="small-box-footer">
                                                    <!--  Mas información <i class="fas fa-arrow-circle-right"></i> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-md-offset-12">
                                        <hr />
                                    </div>
                                </div>


                                <!-- Fin grafico proyectado vs acumulado -->
                            </div>
                        </div>
                    </div>
                    <!-- Fin card proyectado vs acumulado -->

                    <!-- ./col -->
                    <!-- LINE CHART -->
                    <div class="col-lg-6 col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ventas</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" id="linechart">

                                    <canvas id="linechart"
                                        style="min-height: 350px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                <h3 class="card-title">Artículos Top 10 Margen</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" id="piechart">

                                    <canvas id="linechart"
                                        style="min-height: 350px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                <?php
        $hora = date("d-m-Y H:i:s");
        echo "$hora" . "\n"; ?>
            </div>
            <!-- /.card-footer-->

            <!-- The Modal -->
            <div class="modal fade" id="ModalArticulosmasvendidos">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">7 Artículos mas vendidos</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->


                        <div class="modal-body">
                            <div id="masvendidos" class="chart"></div>


                        </div>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        //google.charts.setOnLoadCallback(drawChart);
                        google.charts.setOnLoadCallback(grafartmasvendidos);

                        //grafico modal articulos mas vendidos

                        function grafartmasvendidos() {

                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                <?php

                      while ($row = $grafartmasvendidos->fetch_assoc()) {
                        echo "['" . $row["articulo"] . "'," . $row["total"] . "],";
                      }

                      ?>
                            ]);

                            var options = {
                                //  title: 'Gender Count',
                                width: 800,
                                height: 400,
                                is3D: true
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('masvendidos'));

                            chart.draw(data, options);
                        }
                        $(window).resize(function() {
                            grafartmasvendidos();
                        });
                        </script>
                        <!-- <div class="chart" id="masvendidos"> -->




                        <!-- <canvas id="piechart" style="min-height: 500px; height: 500px; max-height:500px; max-width: 100%;"></canvas>
</div>-->





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
    'packages': ['corechart', 'bar']
});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(grafMargen);
google.charts.setOnLoadCallback(drawMultSeries);

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
        width: '100%',
        height: '100%',
        legend: {
            position: 'bottom'
        }
    };

    var chart = new google.visualization.LineChart(document.getElementById('linechart'));

    chart.draw(data, options);
}
$(window).resize(function() {
    drawChart();
});
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
$(window).resize(function() {
    grafMargen();

});

//Inicio Grafico proyectado mes VS acumulado mes

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
</script>




<!--   -->