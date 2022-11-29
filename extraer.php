<?php
include_once('includes/bd_coneccion.php');

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($coneccion,$_POST['search']['value']); // Search value

## Variables de busqueda por fecha
$buscarFechaInicio = mysqli_real_escape_string($coneccion,$_POST['buscarFechaInicio']);
$buscarFechaFin = mysqli_real_escape_string($coneccion,$_POST['buscarFechaFin']);

## Busqueda normal 
$searchQuery = " ";
if($searchValue != ''){
$searchQuery = " and (numero like '%".$searchValue."%' or articulo like '%".$searchValue."%'  ) ";
}

// Filtramos por fecha
if($buscarFechaInicio != '' && $buscarFechaFin != ''){
$searchQuery .= " and (fecha_creacion between '".$buscarFechaInicio."' and '".$buscarFechaFin."' ) ";
}

## Número total de registros sin filtrar
$sel = mysqli_query($coneccion,"select count(*) as allcount from compra");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Número total de registros con filtrado
$sel = mysqli_query($coneccion,"select count(*) as allcount from compra WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Obtener registros
$empQuery = "select numero,articulo,cantidad, costo_unitario, costo_total,estado,fecha_creacion from compra".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

## select numero,articulo,cantidad, costo_unitario, costo_total,estado,date_format(fecha_creacion, "%d-%m-%Y") from compra 


$empRecords = mysqli_query($coneccion, $empQuery);
$data = array();
//Procesar informacion de MySQL
while ($row = mysqli_fetch_assoc($empRecords)) {
$data[] = array(
"numero"=>$row['numero'],
"articulo"=>$row['articulo'],
"cantidad"=>$row['cantidad'],
"costo_unitario"=>$row['costo_unitario'],
"costo_total"=>$row['costo_total'],
"estado"=>$row['estado'],
"fecha_creacion"=>$row['fecha_creacion']
);
}

## Respuesta
$response = array(
"draw" => intval($draw),
"iTotalRecords" => $totalRecords,
"iTotalDisplayRecords" => $totalRecordwithFilter,
"aaData" => $data
);

echo json_encode($response);
die;