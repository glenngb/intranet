<footer class="main-footer">
    <strong>Atarraya &copy; 2022 <a href="#"></strong>
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalTarjeta">
    Glenn Garcia
  </button>
  <!-- Whatsapp
<a class="btn btn-primary" style="background-color: #25d366;" href="#!" role="button"
  ><i class="fab fa-whatsapp"></i
></a> -->
 

    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
      <span class="go-top">
					<i class="fa fa-angle-up"></i>
				</span>
    </div>
   
  </footer>

  <!-- Modal tarjeta presentacion -->
          
<!-- The Modal -->
<div class="modal fade" id="modalTarjeta">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Contactame</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Glenn Garcia</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: San Ignacio de Loyola 770, Santiago</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: +56 948686099</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="img/glenn-user.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="https://walink.co/92d692" target="_blank" rel="noopener noreferrer" class="btn btn-sm bg-teal">
                    <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://cl.linkedin.com/in/glenn-garcia-barreto-a79775106" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
   <!-- FIN Modal tarjeta presentacion -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
//<![CDATA[
document.cookie = 'same-site-cookie=foo; SameSite=Lax'; 
document.cookie = 'cross-site-cookie=bar; SameSite=None; Secure';
//]]>
</script>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--<script src="js/sweetalert2.all.min.js"></script>-->



<!-- ADMIN-->
<script src="js/admin-ajax.js"></script>
<script src="js/app.js"></script>
<script src="js/login-ajax.js"></script>


<!-- jQuery UI 1.11.4 -->
<script src="js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="js/Chart.min.js"></script>






<!-- JQVMap -->
<script src="js/jquery.vmap.min.js"></script>

<!-- daterangepicker -->
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="js/tempusdominus-bootstrap-4.min.js"></script>

<!-- overlayScrollbars -->
<script src="js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>


<!-- toastr mensaje de notificaciones -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>



<!-- Load plotly.js into the DOM -->
<script>

$('#articulos').DataTable( {
    
  dom: 'Bfrtip',
        buttons: [
            'print'
        ],
        
"order": [[0, "asc"]], // ordena de forma descendente por ariculo, la columna 1 -articulo-
'paging'      : true, //Conpagina
      'pageLength'  : 15, //conpagina a partir de 6 registros.
  "language":{  //traduce lo que se encuentra en ingles en la tabla
    "lengthMenu": "Mostrar _MENU_ registros por pagina",
    "info": "Mostrando página _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Buscar:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "paginate": {
      "next":       "Siguiente",
      "previous":   "Anterior"
    },					
  }
} );


</script>

<script>

$('#compras').DataTable( {
  "processing": true, 
  dom: 'Bfrtip',
        buttons: [
          'print',
          'excel'
        ],


"order": [[1, "asc"]], // ordena de forma descendente por ariculo, la columna 1 -articulo-
'paging'      : true, //Conpagina
      'pageLength'  : 10, //conpagina a partir de 6 registros.
  "language":{  //traduce lo que se encuentra en ingles en la tabla
    "lengthMenu": "Mostrar _MENU_ registros por página",
    "info": "Mostrando página _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Buscar:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "print":   "Imprimir",
    "paginate": {
      "next":       "Siguiente",
      "previous":   "Anterior"
    },					
  }
} );

</script>

<script>

$('#vendedores').DataTable( {
  "processing": true, 
  dom: 'Bfrtip',
        buttons: [
          'print',
          'excel'
        ],


"order": [[2, "asc"]], // ordena de forma descendente por ariculo, la columna 1 -articulo-
'paging'      : true, //Conpagina
      'pageLength'  : 15, //conpagina a partir de 6 registros.
  "language":{  //traduce lo que se encuentra en ingles en la tabla
    "lengthMenu": "Mostrar _MENU_ registros por página",
    "info": "Mostrando página _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Buscar:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "print":   "Imprimir",
    "paginate": {
      "next":       "Siguiente",
      "previous":   "Anterior"
    },					
  }
} );

</script>




<script>

$('#saldos').DataTable( {
  "processing": true, 
  "dom": 'Bfrtip',
        "buttons": [
               
          {
            extend: 'excelHtml5',
            text: 'Descargar Excel ↓',
         
        }
			   
            
        ],


"order": [[0, "asc"]], // ordena de forma descendente por ariculo, la columna 1 -articulo-
'paging'      : true, //Conpagina
      'pageLength'  : 10, //conpagina a partir de 6 registros.
  "language":{  //traduce lo que se encuentra en ingles en la tabla
    "lengthMenu": "Mostrar _MENU_ registros por pagina",
    "info": "Mostrando pagina _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Buscar:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "print":   "Imprimir",
    "paginate": {
      "next":       "Siguiente",
      "previous":   "Anterior"
    },					
  }
} );

</script>

<script>

// http://localhost/atarraya/informe-ncdevolucion.php
$(document).ready(function () {
    var t = $('#nc').DataTable({
      
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0,
                
            },
            
        ],
        order: [[1, 'asc']],
        
        "language":{  //traduce lo que se encuentra en ingles en la tabla
    "lengthMenu": "Mostrar _MENU_ registros por pagina",
    "info": "Mostrando pagina _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles",
    "infoFiltered": "(filtrada de _MAX_ registros)",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search": "Buscar:",
    "zeroRecords":    "No se encontraron registros coincidentes",
    "print":   "Imprimir",
    "paginate": {
      "next":       "Siguiente",
      "previous":   "Anterior"
    },					
  }
    });
 
    t.on('order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
    
});
</script>


<script> //compras2.php
$(document).ready(function(){

// Datapicker 
$( ".datepicker" ).datepicker({
"dateFormat": "dd-mm-yy",
changeYear: true
});

// Iniciamos el DataTable
var dataTable = $('#compras2').DataTable({
"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
},
'processing': true,
'serverSide': true,
'serverMethod': 'post',
'searching': true,
'ajax': {
'url':'extraer.php',
'data': function(data){
// Leer valores de fecha
var buscar_inicio = $('#buscar_inicio').val();
var buscar_fin = $('#buscar_fin').val();

// Append to data
data.buscarFechaInicio = buscar_inicio;
data.buscarFechaFin = buscar_fin;
}
},
'columns': [
{ data: 'numero' },
{ data: 'articulo' },
{ data: 'cantidad' },
{ data: 'costo_unitario' },
{ data: 'costo_total' },

{ data: 'estado' },
{ data: 'fecha_creacion' },
]
});

// Boton Buscar
$('#btn_search').click(function(){
dataTable.draw();
});

});

</script>

</body>
</html>
