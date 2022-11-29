<?php 
session_start();// se agrega para subir al hosting
include_once ('templates/header.php');
include_once ('templates/barra-superior.php');
include_once ('templates/navegacion-lateral.php');
?>
<?php
include_once('includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 
$where = "";

	if(!empty($_POST)) //condicion para buscar
	{
		$valor = $_POST['numero'];
		if(!empty($valor)){
			$where = "WHERE a.numero LIKE '%$valor%'"; //  con el % busca los valores en la tabla que contenga alguna coincidencia, se puede modificar -- en este caso busca por el nombre, se puede modificar para que sea en otro campo
		}
		
		//fin condicion para buscar
	}
	$sql = "SELECT 
    SUBSTRING(codigo,-1) as codigo,
    nombre,
    numero_local,
    comision_local,
    comision_individual,
    fecha_ingreso,
    cargo,
    password
FROM
    punto_venta.vendedor;"  ;
	$resultado = $coneccion->query($sql);

$sql =  "SELECT count(*) AS numvendedores FROM punto_venta.vendedor;";
$cuentavendedores = $coneccion->query($sql);
?>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vendedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Vendedores</li>
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
            <?php while ($row = $cuentavendedores->fetch_array(MYSQLI_ASSOC)) { ?>
                <h3 class="card-title"></h3> </i> &nbsp;&nbsp; <?php echo $row['numvendedores'] . " Vendedores"; ?></H6><?php } ?>
                <h3 class="card-title"><i class="fas fa-user-tie nav-icon"></i> 

                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <div class="row table-responsive">
                    <!-- tabla que muestra la consulta -->
                    <table id="vendedores" class="table table-striped table-bordered" style="width:100%">
                        <!-- para el autofiltro de la tabla -->

                        <thead>
                            <!-- Encabezado de la tabla -->
                            <tr>
                                <th>
                                    <center>Cód.</center>
                                </th>
                                <th>
                                    <center>Nombre</center>
                                </th>
                                <th>
                                    <center>N° local</center>
                                </th>
                                <th>
                                    <center>Com. local</center>
                                </th>
                                <th>
                                    <center>Com. individual</center>
                                </th>
                                <th>
                                    <center>Fecha de ingreso</center>
                                </th>
                                <th>
                                    <center>Cargo</center>
                                </th>
                                <th>
                                     <center>Password</center>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <!-- Recorre todos los resultados de nuestra consulta -->
                            <tr>
                                <!-- imprime los resultados en pantalla -->

                                <td>
                                    <center><?php echo $row['codigo']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo $row['nombre']; ?></center>
                                </td>
                                <td>
                                    <center><?php echo $row['numero_local']; ?></center>
                                </td>
                                <td>
                                <center><?php echo $row['comision_local']; ?></center>
                                </td><!-- separador de miles -->
                                <td>
                                <center><?php echo $row['comision_individual']; ?></center>
                                </td>
                                <td>
                                <center><?php 
								$date = date_create($row['fecha_ingreso']); 
								echo date_format($date, 'd-m-Y'); ?></center>
                                </td>
                                <td>
                                <center><?php echo $row['cargo']; ?></center>
                                </td>
                                
                                <td>
                                <div id="caja" onclick="divLogin()"><center><?php echo $row['password']; ?></center></div>
                                
                                </td>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Datatables -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Vendedores
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


<script>
var clic = 1;

function divLogin(){ 

   if(clic==1){
    document.getElementById("caja").style.display = "none";   

   clic = clic + 1;

   } else{

    document.getElementById("caja").style.display = "block";

    clic = 1;

   }   
}
</script>

<?php   
      include_once ('templates/footer.php');
  ?>