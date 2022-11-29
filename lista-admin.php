<?php 
session_start();// se agrega para subor al hosting
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
                <div class="col-sm-6">
                    <h1>
                        <small> <i class="nav-icon fas fa-user"></i></small>
                        Listado de usuarios

                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluidd -->
    </section>
    <!--Tamaño -->

    <div class="col-md-8">

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gestiona a los usuarios en esta sección</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <div class="card-body">
                    <table id="registros" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Admin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 

                        try {
                          $sql = "SELECT id, usuario, nombre, nivel FROM administradores"; //Crea consulta SQL
                          
                          $respuesta = $coneccion->query($sql); //Ejecuta consulta SQL

                        } catch(Exception $e){
                           $error = $e->getMessage();
                           echo $error;
                        }
                        
                        $numero = 1;
                        while($resultado = $respuesta->fetch_assoc()){
                      ?>


                            <tr>
                                <td> <?php echo $numero; ?> </td>
                                <td> <?php echo $resultado['usuario']; ?> </td>
                                <td> <?php echo $resultado['nombre']; ?> </td>
                                <td>
                                    <?php
                                         if ($resultado['nivel'] ==1) {
                                          echo "<blink><font color='#00E511'> <i class='fas fa-check'></font></blink></i>";
                                         }?>
                                          </td>
                                <td>
                                    <a href="editar-admin.php?id=<?php echo $resultado['id'];?>"
                                        class="btn bg-orange btn-flat margin">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $resultado['id']; ?>" data-tipo="admin"
                                        class="btn bg-maroon btn-flat margin borrar_registro">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php 
                        $numero++;
                        }
                      ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Número</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Admin</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
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