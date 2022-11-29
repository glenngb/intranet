<?php 
  session_start();
  if(isset($_GET['cerrar_sesion'])){
    session_destroy();
  }
  include_once ('includes/bd_coneccion.php');
  include_once ('templates/header.php');

?>
<body class="hold-transition sidebar-mini sidebar-collapse login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Atarraya</b>Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Bienvenido</p>
      

        <form name="login-admin-form" id="login-admin"  method="post" action="login-admin.php">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="far fa-user"></span>
                
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="contrasenia" name="contrasenia" autocomplete="off" placeholder="Contraseña">
            <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
             <!--  <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>-->
            </div>
          </div>
        <!--  <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Recuerdame
                </label>
              </div>
            </div>-->
            <!-- /.col -->
            <div class="col-12">
              <input  type="hidden" name="login-admin" value="1">
              <button type="submit"   class="btn btn-primary btn-block">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
 </div>
      <!-- /.login-card-body -->
    </div>
    <div style="color:#fff">
        <p style="text-align: center;">Desarrollado por Glenn Garcia</p><br>
      </div>
  </div>

  <script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("contrasenia");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>

<?php   
      include_once ('templates/footer.php');
  ?>

