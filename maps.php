<?php
session_start(); // se agrega para subir al hosting
include_once('templates/header.php');
include_once('templates/barra-superior.php');
include_once('templates/navegacion-lateral.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mapas Sucursales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Maps Sucursales</li>
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
        <h3 class="card-title"><i class="fas fa-store"></i> Sucursales</h3>

        <div class="card-tools">

        </div>
      </div>
      <div class="card-body">
        <iframe src="https://www.google.com/maps/d/embed?mid=1uqXyQ7YegaEeTp8_vXNHT6jXkAct_vcF" width="1400" height="800"></iframe>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Maps
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