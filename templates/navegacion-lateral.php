<?php
include_once('includes/sesiones.php');
?>
<!-- MENU LATERAL -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="img/atarraya.png" alt="Atarraya Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Atarraya Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/logo_cokase.png" class="rounded elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <p><?php /*echo $_SESSION['nombre']; */?></p>
                </a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">


                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                        </li>
                    </ul>
                </li>

                <!-- Informes-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">

                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Informes
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="informe-compras.php" class="nav-link">
                                <i class="fas fa-money-check-alt nav-icon"></i>
                                <p>Compras</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="informe-articulos.php" class="nav-link">


                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Artículos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="informe-precios_especiales.php" class="nav-link">


                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Precios especiales</p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-list-alt nav-icon"></i>
                        <p>
                        Nota de crédito
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="informe-nc.php" class="nav-link">
                                <i class="fa fa-list-ul nav-icon"></i>
                                <p>NC</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="informe-ncdevolucion.php" class="nav-link">

                                <i class="fas fa-exchange-alt"></i>
                                <p>Devolución</p>
                            </a>
                        </li>

                        <li class="nav-item">

                        </li>
                    </ul>
                </li>






                        <li class="nav-item">
                            <a href="informes-drive.php" class="nav-link">
                                <i class="fab fa-google-drive nav-icon"></i>
                                <p>Informes Drive</p>
                            </a>
                        </li>

                       

                        <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line  nav-icon"></i>
                        <p>
                       Ventas
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="sales.php" class="nav-link">
                                <i class="fa fa-store nav-icon"></i>
                                <p>Por Local</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pies3.php" class="nav-link">

                                <i class="fas fa-exchange-alt"></i>
                                <p> Venta Proyectada</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="informe-boletas.php" class="nav-link">

                                <i class="fas fa-file-invoice"></i>
                                <p> Boletas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="informe-saldos.php" class="nav-link">

                                <i class="far fa-list-alt"></i>
                                <p> Venta saldos</p>
                            </a>
                        </li>


                        <li class="nav-item">

                        </li>
                    </ul>
                </li>




                        <li class="nav-item">
                            <a href="cierremes.php" class="nav-link">


                                <i class="fas fa-calendar-check nav-icon"></i>


                                <p>Cierre de mes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="informe-vendedores.php" class="nav-link">


                                <i class="fas fa-user-tie nav-icon"></i>


                                <p>Vendedores</p>
                            </a>
                        </li>

                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a href="informe-cokase.php" class="nav-link">

                            <i class="far fa-chart-bar nav-icon"></i>

                                <p>Análisis BI</p>
                            </a>
                        </li>



                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a href="informe-boletasr.php" class="nav-link">
                           

                                <i class="fa fa-hourglass-half  nav-icon"></i>
                                <p>Fol. Restantes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="maps.php" class="nav-link">


                                <i class="fas fa-map-marker-alt nav-icon"></i>
                                <p>Sucursales</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php //Código para restringir el acceso al menú. solo perfil Administradores pueden visualizar en menú.
        if ($_SESSION['nivel'] == 1) :
        ?>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="lista-admin.php" class="nav-link">
                                <i class="fa fa-list-ul nav-icon"></i>
                                <p>Listar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="crear-admin.php" class="nav-link">

                                <i class="fas fa-user-plus nav-icon"></i>
                                <p>Agregar</p>
                            </a>
                        </li>

                        <li class="nav-item">

                        </li>
                    </ul>
                </li>
                <?php endif; ?>


                <div class="dropdown-divider"></div>
                 <li class="nav-item rojito">
                 <a href="#" class="nav-link"  id="cerrarSesion">  <!-- id="cerrarSesion" hace referencia al Swal.fire en admin-ajax.js-->
                        <i class="nav-icon fas fa-sign-out-alt "></i>
                        <p>
                            Cerrar Sesión
                        </p>
                    </a>
                </li>   
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

