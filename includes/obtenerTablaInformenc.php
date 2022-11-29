<?php
include_once('../includes/bd_coneccion.php');
$query=" SELECT 
local,
      numero_venta,
      articulo,
      cantidad,
      descuento,
      precio_unitario,
      precio_total,
      fecha_de_venta,
      costo_unitario,
      costo_total,
      margen,
      item
FROM
punto_venta.detalle_venta where cantidad < 0 ";

$result=$coneccion->query($query);
$data=array();
while($row=$result->fetch_array(MYSQLI_ASSOC)){
  $data[] =$row;
}

$results= ["sEcho"=>1,
          "iTotalRecords"=>count($data),
          "iTotalDisplayRecords"=>count($data),
          "aaData"=>$data ];

echo json_encode($results);
