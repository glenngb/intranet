<?php 
session_start();
include_once ('templates/header.php');
include_once ('templates/barra-superior.php');
include_once ('templates/navegacion-lateral.php');
?>

<?php
include_once('includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 
$where = "";

if (!empty($_POST)) //condicion para buscar
{
    $valor = $_POST['numero'];
    if (!empty($valor)) {
        $where = "WHERE a.numero LIKE '%$valor%'"; //  con el % busca los valores en la tabla que contenga alguna coincidencia, se puede modificar -- en este caso busca por el nombre, se puede modificar para que sea en otro campo
    }

    //fin condicion para buscar
}
$sql = "SELECT d.nombre, EXTRACT(DAY FROM d.cumpleano) as dia,
COALESCE(COUNT(filtered_data.nombre), 0) as cuenta
FROM intranet.directorio d
LEFT JOIN (
SELECT nombre, EXTRACT(DAY FROM cumpleano) as dia
FROM intranet.directorio
WHERE MONTH(cumpleano) = MONTH(CURDATE())
GROUP BY nombre, dia
) AS filtered_data
ON d.nombre = filtered_data.nombre AND EXTRACT(DAY FROM d.cumpleano) = filtered_data.dia
GROUP BY d.nombre, dia;
"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!-- <h1>Blank Page</h1>-->
          </div>
         <!--  <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home-inicio</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">

        <div class="alert alert-primary" role="alert">
          <h3 class="card-title">Bienvenido</h3>

<!--TEST INDICADORES -->

<div class="d-flex justify-content-end">
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
try {
$xml = simplexml_load_file($url);
$fecha = $xml->Dolares[0]->Dolar->Fecha;
$fechaFormateada = date('d-m-Y', strtotime($fecha));

$url2 = 'https://api.cmfchile.cl/api-sbifv3/recursos_api/uf?apikey=00bd32a010f0c8e58b3ba2dd618bd057880559fb&formato=xml';
$xml2 = simplexml_load_file($url2);


//$url3 = 'https://api.cmfchile.cl/api-sbifv3/recursos_api/utm?apikey=00bd32a010f0c8e58b3ba2dd618bd057880559fb&formato=xml';
//$xml3 = simplexml_load_file($url3);

echo 'Fecha ' .$fechaFormateada . ' | ';
echo 'Dólar observado $' .$xml->Dolares[0]->Dolar->Valor. ' | ';
echo 'UF $' .$xml2->UFs[0]->UF->Valor.' | ';

} catch (Exception $e) {
    echo 'Error loading XML: ESTE ES EL ERROR ' . $e->getMessage();
}

?>
                    <!-- Fin Indicadores -->
                    </div>
                    </div> 
<!--FIN TEST INDICADORES -->

<div class="container">
  <div class="row">
    <div class="col-md-7">
      <div class="card text-center">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
    </div>
    <div class="col-md-5  ">
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Cumpleaños  
                      <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                            "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        var f = new Date();
                        document.write(meses[f.getMonth()] + " de " + f.getFullYear());
                    </script></div>
        <div class="card-body">
          <h5 class="card-title">
       Felicitaciones para:
          </h5>
          <p class="card-text">
  <?php
  $rows_found = false; // Variable para controlar si se encontraron registros

  while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
    if ($row['cuenta'] > 0) {
      if (!$rows_found) {
        echo '<ul>';
        $rows_found = true;
      }
      echo '<li>' . $row['nombre'] . ' - Día ' . $row['dia'] . '</li>';
    }
  }

  if (!$rows_found) {
    echo 'No hay cumpleaños este mes 😞';
  } else {
    echo '</ul>';
  }
  ?>
</p>


        </div>
      </div>
    </div>
  </div>
</div>

<hr>


          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
        <div class="card-group">
  <div class="card">
    <!--<div class="color-box" style="background-color: #644687; height: 120px; background-size: cover;">
        <h2 style="color: white; text-align: center; padding-top: 20px; font-size: 70px;">Novedades</h2>
    </div>-->
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text"><div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Novedades
  </a> 
  <a href="#" class="list-group-item list-group-item-action">Sabadón de ofertas</a>
  <a href="#" class="list-group-item list-group-item-action">El gran zapatazo</a>
  <a href="#" class="list-group-item list-group-item-action">Descuentos por temporada</a>
  <a href="#" class="list-group-item list-group-item-action">Concursos en redes sociales</a>
  <a href="#" class="list-group-item list-group-item-action">Exhibiciones</a>
</div></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <!--<div class="color-box" style="background-color: #644687; height: 120px; background-size: cover;">
        <h2 style="color: white; text-align: center; padding-top: 20px; font-size: 70px;">Precios</h2>
    </div>-->
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text"><div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Lista de precios resumida
  </a>
  <a href="https://drive.google.com/file/d/13jz30t7bsw011k4wIej6VgoI0Fe5-tG1/view?usp=drive_link" class="list-group-item list-group-item-action" target="_blank">02-08-2023</a>

</div></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
   <!-- <div class="color-box" style="background-color: #644687; height: 120px; background-size: cover;">
        <h2 style="color: white; text-align: center; padding-top: 20px; font-size: 70px;">CLP</h2>
    </div>-->
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text"><div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
   Cambio lista de precios
  </a>
  <a href="#" class="list-group-item list-group-item-action">02-08-2023</a>
  <a href="#" class="list-group-item list-group-item-action">09-08-2023</a>
  <a href="#" class="list-group-item list-group-item-action">16-08-2023</a>
  <a href="#" class="list-group-item list-group-item-action">23-08-2023</a>
  <a href="#" class="list-group-item list-group-item-action">30-08-2023</a>
</div></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
</div>


<hr>



  


</div>




        </div>
        <iframe src="https://widgets.woxo.tech/3e7ccd80-0768-445f-b89f-f7014d7032cd#mission-control-component-1ed05bf8-897e-4894-bbab-8e6db2f2ac96" style="width: 100%; height: 100vh; border: none; overflow: hidden;"></iframe>

         <!-- /.card-body -->
         <div class="card-footer">
                        Footer
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
 