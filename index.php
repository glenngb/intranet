<?php 
  session_start();
  if(isset($_GET['cerrar_sesion'])){
    session_destroy();
  }
  include_once ('includes/bd_coneccion.php');
  include_once ('templates/header.php');

?>



	  
	<div class="sidenav">

	<div class="col-sm-12 side_menu">
  
  	

    <!-- INICIO-->


    <body class="login-page">

      
  <div class="login-box">
   <!--  test <div class="login-logo">
      <a href="#"><b><Atarraya/b>Admin</a>
    </div>-->
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
      <img src="img/k.png" alt="Logo" style=display: block; margin: 0 auto; margin-bottom: 10px; margin-top: 30px">
        <H5 class="login-box-msg">Intranet <b>COKASE</b></H5>
      

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
  
    </div>
    
 
    <!-- TERMINO-->
	 
	
	  
	  
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

	 

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


