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
        
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Herramientas</li>
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
          <h3 class="card-title">Herramientas colaborativas</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Herramientas colaborativas</h4>
  <p>Las herramientas colaborativas son aplicaciones, software y plataformas diseñadas para facilitar la comunicación, la cooperación y la interacción entre individuos que trabajan juntos en un entorno empresarial. Estas herramientas permiten a los equipos colaborar de manera eficiente, compartir información, coordinar tareas y trabajar en conjunto, independientemente de su ubicación geográfica.</p>
  <hr>
  <p class="mb-0"><h4>La importancia en una empresa radica en varios factores clave: <br></h4> Comunicación mejorada - Acceso compartido a la información - Coedición en tiempo real - Gestión de proyectos - Flexibilidad y trabajo remoto - Facilitación de la innovación - Historial y seguimiento - Reducción de barreras</p>
</div>

<div class="container mt-5">
    
    <ul class="list-group">
      <li class="list-group-item">Slack: Plataforma de comunicación empresarial que agiliza la colaboración mediante mensajes y canales temáticos.  <a href="https://slack.com/intl/es-cl">Slack</a></li></li>
      <li class="list-group-item">Trello: Herramienta de gestión de proyectos visual basada en tableros, ideal para organizar tareas de manera intuitiva. <a href="https://trello.com/">Trello</a></li></li>
      <li class="list-group-item">Google Drive, OneDrive y Dropbox: Servicios de almacenamiento en la nube que permiten guardar, compartir y acceder a archivos desde cualquier lugar, mejorando la colaboración y el acceso a la información.  <a href="https://www.google.com/drive/">Google Drive</a> <a href="https://www.microsoft.com/en-us/microsoft-365/onedrive/online-cloud-storage">| One Drive</a> <a href="https://www.microsoft.com/en-us/microsoft-365/onedrive/online-cloud-storage">| Dropbox</a> </li> 
    </ul>
  </div>
        </div>
         <!-- /.card-body -->
         <div class="card-footer">
         Herramientas colaborativas

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
 