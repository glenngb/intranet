<?php 
session_start();// se agrega para subor al hosting

include_once ('includes/sesiones.php');
  //Validamos que el nivel de usuario sea 1. Para permitir el acceso a este archivo.
  //if( (int) $_SESSION['nivel'] == 0) {
    //header('Location: admin-area.php');
    //exit;
  //}
  include_once ('includes/bd_coneccion2.php');
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
          <div class="col-sm-12">
          <h1>
          <small> <i class="fas fa-user-plus nav-icon"></i></small>
               Crear Usuario   
        </h1>
          </div>
          <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="#">Home-Agregar Administrador</a></li>-->
                <!-- <li class="breadcrumb-item active">Agregar Administrador</li>-->

              </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!--Tamaño -->
   
    <div class="col-md-8">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Crear Usuario</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-admin.php"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa un usuario" required>
                    </div>

                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre y apellidos" required>
                    </div>

                    <div class="form-group">
                      <label for="contrasenia">Contraseña:</label>
                      <input type="password" class="form-control" id="contrasenia" name="contrasenia" autocomplete="off" placeholder="Ingresa una contraseña" required>
                    </div>

                    <div class="form-group">
                      <label for="contrasenia">Repetir contraseña:</label>
                      <input type="password" class="form-control" id="repetir_contrasenia" name="repetir_contrasenia" autocomplete="off" placeholder="Repita la contraseña" required>
                      <span id="resultado_contrasenia" class="help-block"></span>
                    </div>

                    <div class="form-group">
                      <label for="nivel">Nivel de usuario </label>
                      <select name="nivel" id="nivel" class="form-control">
                        <option value=""> Seleccione </option>
                        <option value="0">Usuario estándar</option>
                        <option value="1">Super-usuario</option>
                      </select>
                      <span id="resultado_nivel_usuario" class="help-block"></span>
                    </div>

                  </div>
                  <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="crear_registro_admin">Añadir</button>
                  </div>
              </form>  
        </div>
        </div>
       
         <!-- /.card-body -->
         
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
 