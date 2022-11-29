<?php 
session_start(); // se agrega para subir al hosting
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
            <h1>Notas de Crédito</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Notas de Crédito</li>
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
          <h3 class="card-title">Detalle nota de crédito</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <table id='detalleBoleta' class="table table-striped table-bordered" style="width:100%">
            <!-- para el autofiltro de la tabla -->


            <thead>
              <!-- Encabezado de la tabla -->
              <tr>
                <th>
                  Local
                </th>
                <th>
                  Boleta
                </th>
                <th>
                  Articulo
                </th>
                <th>
                  Cantidad
                </th>
                <th>
                  Descuento
                </th>
                <th>
                   Precio U
                </th>
                <th>
                   Precio T
                </th>
                <th>
                  Fecha
                </th>
                <th>
                   Costo U 
                </th>
                <th>
                   Costo T
                </th>
                <th>
                    Margen
                </th>
                <th>
                    Item
                </th>             
              </tr>
            </thead>
            <tfoot>
                  <tr>
                      <th>Local</th>
                      <th>Boleta</th>
                      <th>Artículo</th>
                      <th>Cantidad</th>
                      <th>Descuento</th>
                      <th>Precio U</th>
                      <th>Precio T</th>
                      <th>Fecha</th>
                      <th>Costo U</th>
                      <th>Costo T</th>
                      <th>Margen</th>
                      <th>Item</th>
                  </tr>
                </tfoot>
            </table>
        </div>
         <!-- /.card-body -->
          <!-- / <div class="card-footer">
                        Footer
                    </div>-->
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



<script type="text/javascript">
  $(document).ready(function() {
$('#detalleBoleta').DataTable({
 
 "bProcessing": true,
 "sAjaxSource": "includes/obtenerTablaInformenc.php",
 "aoColumns": [
     
	   { mData: 'local' },
     { mData: 'numero_venta' },
	   { mData: 'articulo' },
     { mData: 'cantidad' },
     { mData: 'descuento' },
     { mData: 'precio_unitario' },
     { mData: 'precio_total' },
     { mData: 'fecha_de_venta' },
     { mData: 'costo_unitario' },
     { mData: 'costo_total' },
     { mData: 'margen' },
     { mData: 'item' }
	  
	 ],
 retrieve: true,
 dom: 'Blfrtip',
 "pageLength": 10,
 "order": [[ 1, "asc" ]],

 "columnDefs": [
   {
	 "visible": false,
	 "searchable": true
   }
 ],
 "language": {
   "sProcessing":     "Obteniendo los datos",
   "sLengthMenu":     "Mostrar _MENU_ registros",
   "sZeroRecords":    "Sin datos",
   "sEmptyTable":     "Ningún dato disponible en esta tabla",
   "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
   "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
   "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
   "sInfoPostFix":    "",
   "sSearch":         "Buscar:",
   "searchPlaceholder": "Escribe aquí para buscar..",
   "sUrl":            "",
   "sInfoThousands":  ",",
   "sLoadingRecords": "Cargando",
   "oPaginate": {
	 "sFirst":    "Primero",
	 "sLast":     "Último",
	 "sNext":     "Siguiente",
	 "sPrevious": "Anterior"
   },
   "oAria": {
	 "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	 "sSortDescending": ": Activar para ordenar la columna de manera descendente"
   }
 }
});
} );
</script>