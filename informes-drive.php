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
          <h1>Informes Cokase</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Informes Drive</li>
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
        <h3 class="card-title"></h3>

        <script>
          const fecha = new Date();
          const hoy = fecha.getDate();
          const mesActual = fecha.getMonth() + 1;
          console.log(mesActual);
        </script>

<script>
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();
document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
</script>

        <div class="card-tools">

        </div>
      </div>
      <div class="card-body">
        <iframe src="https://drive.google.com/embeddedfolderview?id=1kAfZKHvfOwNi9v6N4bMZ_qx7ZxwjafC2#grid" width="800" height="600" frameborder="0"></iframe>      
      </div>

      <!-- /.card-body -->
      <div class="card-footer">

</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once('templates/footer.php');
?>