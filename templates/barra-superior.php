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
                <div class="alert alert-info alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                    <strong>Acá se puede mostrar información relevante</strong>
                    <!-- Indicadores -->

                    <!-- Fin Indicadores -->


                </div>


            </ul>


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
                        <a href="index.php?cerrar_sesion=true" class="dropdown-item rojito" onclick="borrarCache()">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                        </a>

                        <script type="text/javascript">
                        function borrarCache() {
                            // Evitar el almacenamiento en caché de la página
                            window.location.href = "index.php?cerrar_sesion=true&nocache=" + new Date().getTime();
                        }
                        </script>


                </li>

            </ul>
        </nav>
        <!-- /.navbar -->