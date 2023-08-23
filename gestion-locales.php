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
                  <!--  <h1>Directorio</h1>-->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Gestión archivos locales</li>
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
                <h3 class="card-title"><i class="fas fa-user-tie nav-icon"></i> Gestión archivos locales

                    
                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">

            
            <div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Ejemplo de un botón -->
            <button type="button" class="btn btn-outline-primary mb-2" data-target="gestion-09.php" data-password="local9">Local 09</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina2.html'">Local 16</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina3.html'">Local 23</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina4.html'">Local 11</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina6.html'">Local 21</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina7.html'">Local 22</button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina8.html'">Local 14</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina9.html'">Local 13</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina10.html'">Local 03</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina11.html'">Local 04</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina12.html'">Local 26</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina13.html'">Local 20</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina14.html'">Local 10</button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina15.html'">Local 29</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina16.html'">Local 15</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina17.html'">Local 25</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina18.html'">Local 06</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina19.html'">Local 27</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina20.html'">Local 07</button>
            <button type="button" class="btn btn-outline-primary mb-2" onclick="location.href='pagina21.html'">Local 08</button>
        </div>
    </div>
</div>

                   
           
        </div>
        <!-- /.card-body -->
        <!--  <div class="card-footer">
            Compras
        </div>-->
        <!-- /.card-footer-->
</div>
<!-- /.card -->

</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL CPONTRASEÑA -->

<div class="modal" id="passwordModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingresa la contraseña</h5>
      </div>
      <div class="modal-body">
        <input type="password" id="passwordInput" class="form-control password-input" placeholder="Contraseña">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="passwordSubmit">Enviar</button>
      </div>
    </div>
  </div>
</div>
<style>
  .password-input {
    font-family: 'arial', sans-serif;
    letter-spacing: 5px;
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('.btn[data-target]');
  
  buttons.forEach(button => {
    button.addEventListener('click', function() {
      const target = button.getAttribute('data-target');
      const requiredPassword = button.getAttribute('data-password');
      
      const modal = new bootstrap.Modal(document.getElementById('passwordModal'));
      const passwordInput = document.getElementById('passwordInput');
      const passwordSubmit = document.getElementById('passwordSubmit');
      
      passwordInput.value = '';
      
      passwordSubmit.addEventListener('click', function() {
        const enteredPassword = passwordInput.value;
        
        if (enteredPassword === requiredPassword) {
          window.location.href = target;
        } else {
          alert('Contraseña incorrecta');
        }
        
        modal.hide();
      });
      
      modal.show();
    });
  });
});
</script>

<?php
include_once('templates/footer.php');
?>