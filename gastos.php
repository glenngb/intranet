<?php 
session_start();// se agrega para subir al hosting
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
                <!--    <h1>Gastos</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Gastos</li>
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
            
                <h3 class="card-title"><i class="fas fa-money-check-alt nav-icon"></i>

                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSckOYhRU3e1OL-gq4JdigYCU17C_GgDNVkKkX6_wz4a07GB3g/viewform?embedded=true" width="100%" height="1180" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Gastos
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


<script languague="javascript">
        function mostrar() {
            div = document.getElementById('flotante');
            div.style.display = '';
        }

        function cerrar() {
            div = document.getElementById('flotante');
            div.style.display = 'none';
        }
</script>

<?php   
      include_once ('templates/footer.php');
  ?>