<?php 
session_start();
include_once ('templates/header.php');
include_once ('templates/barra-superior.php');
include_once ('templates/navegacion-lateral.php');
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1>Blank Page</h1>-->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Solicitud de insumos</li>
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
          <h3 class="card-title">Solicitud de insumos</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSf11k0g6IpEyks_b_5lVbVyvgfIsBgzWEDvQsiDJ19jfVlHsw/viewform?embedded=true" width="100%" height="800" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
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
 