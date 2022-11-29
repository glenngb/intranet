<?php 
include_once ('templates/header.php');
include_once ('templates/barra-superior.php');
include_once ('templates/navegacion-lateral.php');

include_once ('includes/bd_coneccion.php');

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
        <div id="piechart" style="width: 900px; height: 500px;"></div>
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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
          
          while($row = $grafpie->fetch_assoc()) {
           echo "['".$row["articulo"]."',".$row["margen"]."],";

          
         }
        
        ?>
        ]);

        var options = {
          title: 'Gender Count',
		  is3D: true
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 