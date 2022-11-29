<?php
session_start();// se agrega para subor al hosting
//include_once('../includes/sesiones.php');
include_once('../includes/sesiones.php'); // Si no esta logueado lo rediecciona a la pagina login
include('reportegeneral.php'); // Referencia a la plantilla

include_once('../includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 
$sql = "SELECT articulo, descripcion, precio_venta, precio_costo,fecha_ingreso FROM punto_venta.articulo order by articulo asc"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);

$pdf = new PDF(); // 'L', 'mm','letter'    3 parametro, orientacion(P vertical. L horizontal) unidad de medida, formato personalizado
$pdf->AddPage('portrait','letter'); //3 parametros Orientacion , tamaño y rotacion
$pdf->AliasNbPages();

//Encabezado
$pdf->SetFillColor(232,232,232);  // define color encabezado
$pdf->SetFont('Arial','B','12');
$pdf->SetDrawColor(241,241,241);// define color de celdas
$pdf->Cell(18,6,utf8_decode('Artículo'),1,0,'C',1);
$pdf->Cell(62,6,utf8_decode('Descripción'),1,0,'C',1);
$pdf->Cell(36,6,'Precio de venta',1,0,'C',1);
$pdf->Cell(36,6,'Precio de costo',1,0,'C',1);
$pdf->Cell(46,6,'Fecha de ingreso',1,1,'C',1);

//Data
$pdf->SetFont('Arial','','10');
while($row=$resultado->fetch_assoc()){

    $pdf->Cell(18,6,$row['articulo'],1,0,'C');
    $pdf->Cell(62,6,$row['descripcion'],1,0,'C');
    $pdf->Cell(36,6,number_format($row['precio_venta'], 0,'$', '.'),1,0,'C');
    $pdf->Cell(36,6,number_format($row['precio_costo'], 0,'$', '.'),1,0,'C');
    $pdf->Cell(46,6,$row['fecha_ingreso'],1,1,'C');
}

//salida pdf descargable

$pdf->Output('I', 'nombre_reporte.pdf');// Destino, nombre del fichero
