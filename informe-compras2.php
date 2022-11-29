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
    a.numero, a.articulo, a.cantidad, a.costo_unitario, a.costo_total, b.nombre,a.estado, a.fecha_creacion
FROM
    compra AS a
        INNER JOIN
  proveedor AS b  ON a.id_proveedor = b.id order by numero "  ; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
	$resultado = $coneccion->query($sql);
?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compras</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compras</li>
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
          <h3 class="card-title">Compras</h3>

          <div class="card-tools">
           
          </div>
        </div>

        <main>
<div class="container">
<div class="alert alert-primary" role="alert">
Datatables con rango de fechas
</div>

<!-- Date Filter -->
<form id="formFecha">
<table>
<tr>
<td>
<input type='text' readonly id='buscar_inicio' class="datepicker" placeholder='Fecha Inicio'class="form-control form-control-sm">
</td>
<td>
<input type='text' readonly id='buscar_fin' class="datepicker" placeholder='Fecha fin' class="form-control form-control-sm">
</td>
<td>
<input type='button' id="btn_search" value="Buscar" class="btn btn-primary btn-sm">
</td>
<td>
<input type='button' id="btnLimpiar" value="Limpiar" class="btn btn-danger btn-sm">
</td>
</tr>
</table>
</form>
<hr>
        <div class="card-body">
        <div class="row table-responsive">   <!-- tabla que muestra la consulta -->
			<!-- Table -->
<table id='compras2' class="table table-striped" style="width:100%">
<thead>
<tr>
<th>numero</th>
<th>articulo</th>
<th>cantiad</th>
<th>costo1</th>
<th>costo2</th>
<th>estado</th>
<th>fecha</th>
</tr>
</thead>

</table>
</div>

</main>
<script>
$("#btnLimpiar").click(function(event) {
$("#formFecha")[0].reset();
});
</script>
         <!-- /.card-body -->
         <div class="card-footer">
                        Compras
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
 