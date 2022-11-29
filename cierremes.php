<?php 
session_start();// se agrega para subir al hosting
include_once ('templates/header.php');
include_once ('templates/barra-superior.php');
include_once ('templates/navegacion-lateral.php');
include_once('includes/bd_coneccion.php');


/*$sql = "SELECT 
              count(*) as cierrecount
              FROM
              local AS l
                  LEFT JOIN
              cierre_mes_local AS cml ON l.numero = cml.numero_local
                  and cml.fecha BETWEEN DATE_ADD(DATE_SUB(DATE_SUB(NOW(),
                          INTERVAL DAYOFMONTH(NOW()) DAY),
                      INTERVAL DAYOFMONTH(DATE_SUB(NOW(),
                                  INTERVAL DAYOFMONTH(NOW()) DAY)) DAY),
                  INTERVAL 25 DAY) AND DATE_ADD(DATE_SUB(NOW(),
                      INTERVAL DAYOFMONTH(NOW()) DAY),
                  INTERVAL 5 DAY) where l.numero not in (1,2)"; 
                  $cie = $coneccion->query($sql);*/

                  $sql = "SELECT 
                  count(distinct numero_local) as cierrecount
              FROM
                  cierre_mes_local
              WHERE
                  fecha BETWEEN DATE_ADD(DATE_SUB(DATE_SUB(NOW(),
                              INTERVAL DAYOFMONTH(NOW()) DAY),
                          INTERVAL DAYOFMONTH(DATE_SUB(NOW(),
                                      INTERVAL DAYOFMONTH(NOW()) DAY)) DAY),
                      INTERVAL 25 DAY) AND DATE_ADD(DATE_SUB(NOW(),
                          INTERVAL DAYOFMONTH(NOW()) DAY),
                      INTERVAL 5 DAY)";
                      $cie = $coneccion->query($sql);       



$sql = "SELECT 
l.numero as numero ,cml.fecha as fecha, cml.cierre as cierrel
FROM
local AS l
    LEFT JOIN
cierre_mes_local AS cml ON l.numero = cml.numero_local
    and cml.fecha BETWEEN DATE_ADD(DATE_SUB(DATE_SUB(NOW(),
            INTERVAL DAYOFMONTH(NOW()) DAY),
        INTERVAL DAYOFMONTH(DATE_SUB(NOW(),
                    INTERVAL DAYOFMONTH(NOW()) DAY)) DAY),
    INTERVAL 25 DAY) AND DATE_ADD(DATE_SUB(NOW(),
        INTERVAL DAYOFMONTH(NOW()) DAY),
    INTERVAL 5 DAY) where l.numero not in (1,2);
    "; 
$resultado = $coneccion->query($sql);

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Verificar cierre de mes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Verificar cierre de mes</li>
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
                <h3 class="card-title"> <?php
                $localesActual=22;
                  while($row = $cie->fetch_array(MYSQLI_ASSOC)) 
                    if ($row['cierrecount'] ==$localesActual) {
                    echo "<blink><font color='#00E511'> <i class='fas fa-check'></font></blink></i>" . ' Todos los locales cierran mes | han cerrado mes '.$row['cierrecount'].' locales de '.$localesActual;
                } else {            
                    echo "<blink><font color='#ff0000'> <i class='fas fa-times'></b></font></blink></i>" . ' Faltan locales por cerrar mes | han cerrado mes '.$row['cierrecount'].' locales de '.$localesActual;
               } ?>
                </h3>

                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">

                <div class="row table-responsive">
                    <!-- tabla que muestra la consulta -->
                    <table id="cierremes" class="table table-striped table-bordered" style="width:100%">
                        <!-- para el autofiltro de la tabla -->

                        <thead>
                            <!-- Encabezado de la tabla -->
                            <tr>
                                <th>
                                    <center>Local</center>
                                </th>
                                <th>
                                    <center>Fecha de cierre</center>
                                </th>
                                <th>
                                    <center>Cierre</center>
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <!-- Recorre todos los resultados de nuestra consulta -->
                            <tr>
                                <!-- imprime los resultados en pantalla -->

                                <td>
                                    <center><?php echo $row['numero']; ?></center>
                                </td>
                                <td>
                                    <center><?php 
								$date = date_create($row['fecha']); 
								echo date_format($date, 'd/m/Y'); ?></center>
                                </td>
                                <td>
                                    <center><?php 
              
              if ($row['cierrel'] ==1) {
                echo "<blink><font color='#00E511'> <i class='fas fa-check'></font></blink></i>";
                } else {
                 
                    echo "<blink><font color='#ff0000'> <i class='fas fa-times'></b></font></blink></i>";

               }
          
              ?></center>
                                </td>
                            </tr>
                            <?php } 


            ?>

                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Cierre mes locales
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

<script>
$('#cierremes').DataTable({
    "processing": true,
    dom: 'Bfrtip',
    buttons: [

    ],


    "order": [
        [1, "asc"]
    ], // ordena de forma descendente por ariculo, la columna 1 -articulo-
    'paging': true, //Conpagina
    'pageLength': 20, //conpagina a partir de 6 registros.
    "language": { //traduce lo que se encuentra en ingles en la tabla
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrada de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron registros coincidentes",
        "print": "Imprimir",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});
</script>