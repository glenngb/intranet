<?php
include_once('includes/sesiones.php');
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                    <strong>Indicadores financieros:</strong>
                    <!-- Indicadores -->
                    <?php

$context = stream_context_create(array('ssl'=>array(
    'verify_peer' => false, 
    "verify_peer_name"=>false
    )));

libxml_set_streams_context($context);

//$sxml = simplexml_load_file($webhostedXMLfile);

$url = 'https://api.cmfchile.cl/api-sbifv3/recursos_api/dolar?apikey=00bd32a010f0c8e58b3ba2dd618bd057880559fb&formato=xml';
$xml = simplexml_load_file($url);

$url2 = 'https://api.cmfchile.cl/api-sbifv3/recursos_api/uf?apikey=00bd32a010f0c8e58b3ba2dd618bd057880559fb&formato=xml';
$xml2 = simplexml_load_file($url2);


$url3 = 'https://api.cmfchile.cl/api-sbifv3/recursos_api/utm?apikey=00bd32a010f0c8e58b3ba2dd618bd057880559fb&formato=xml';
$xml3 = simplexml_load_file($url3);

echo 'Fecha ' .$xml->Dolares[0]->Dolar->Fecha. ' | ';
echo 'Dólar observado $' .$xml->Dolares[0]->Dolar->Valor. ' | ';
echo 'UF $' .$xml2->UFs[0]->UF->Valor.' | ';

?>
                    <!-- Fin Indicadores -->

                   
                </div>
                

            </ul>
            <div class="loading">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
          

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                        <span class="hidden-xs">Hola: <?php echo $_SESSION['nombre']; ?></span>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Acciones</span>
                        <div class="dropdown-divider"></div>
                        <a href="editar-admin.php?id=<?php echo $_SESSION['id']; ?>" class="dropdown-item">
                            <i class="fas fa-pencil-alt mr-2"></i> Editar perfil

                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="index.php?cerrar_sesion=true" class="dropdown-item  rojito">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                        </a>

                </li>
               
            </ul>
        </nav>
        <!-- /.navbar -->