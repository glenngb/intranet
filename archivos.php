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
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Archivos</li>
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
          <h3 class="card-title">Archivos</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        

        <div class="container mt-5">
  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-users" aria-hidden="true"></i> RRHH
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          Contenido de la sección 1. Puedes agregar aquí todo el contenido que desees.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Comercial
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          Contenido de la sección 2. Puedes agregar aquí todo el contenido que desees.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header" id="headingTres">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
          <i class="fa fa-laptop" aria-hidden="true"></i> Informática
          </button>
        </h2>
      </div>
      <div id="collapseTres" class="collapse" aria-labelledby="headingTres" data-parent="#accordionExample">
        <div class="card-body">
          Contenido de la sección 3. Puedes agregar aquí todo el contenido que desees.
        </div>
      </div>
    </div>

    <!-- Puedes agregar más secciones de la misma manera -->
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
      include_once ('templates/footer.php');
  ?>
 