<?php 
include_once ('includes/bd_coneccion.php');

  //Captura de datos para proceder con la consulta SQL y llenar el formulario.
  $id = $_GET['id'];

  if( ! filter_var($id, FILTER_VALIDATE_INT)) { //Valida que el id sea entero. Negamos para valida si alguien envia letras
  
    header('Location: lista-admin.php');
  }
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
          <h1>
            Editar administrador
         
        <small> --</small>
        </h1>
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
    <!--Tamaño -->
   
    <div class="col-md-8">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edición de Administrador</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <?php 
              //Código para consultar registro  de la BD.
              $sql = "SELECT * FROM administradores WHERE id = {$id}";
              $respuesta = $coneccion->query($sql);
              $resultado = $respuesta->fetch_assoc();
          
            ?>
              <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-admin.php"> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $resultado['usuario']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $resultado['nombre']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="constrasenia">Contraseña:</label>
                      <input type="password" class="form-control" id="contrasenia" name="contrasenia">
                    </div>

                  </div>
                  <div class="box-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
 