<?php // formato de informe compras con FPDF
session_start();// se agrega para subor al hosting
//include_once('../includes/sesiones.php');
include_once('../includes/sesiones.php'); // Si no esta logueado lo rediecciona a la pagina login
include('reportegeneral_compras.php'); // Referencia a la plantilla

include_once('../includes/bd_coneccion.php');  // llama al archivo para la conexion a la bd - 
$sql = "SELECT 
a.numero as numero, a.articulo as articulo, a.cantidad as cantidad, a.costo_unitario as costo_unitario, a.costo_total as costo_total, b.nombre as nombre,a.estado as estado, a.fecha_creacion as fecha_creacion,a.fecha_anulacion as fecha_anulacion
FROM
compra AS a
    INNER JOIN
proveedor AS b  ON a.id_proveedor = b.id order by numero"; // eLimit limita a que se muestre solo 10 registros en la tabla, es opcional colocarlo
$resultado = $coneccion->query($sql);

$pdf = new PDF(); // 'L', 'mm','letter'    3 parametro, orientacion(P vertical. L horizontal) unidad de medida, formato personalizado
$pdf->AddPage('portrait','letter'); //3 parametros Orientacion , tamaño y rotacion
$pdf->AliasNbPages();

//Encabezado
$pdf->SetFillColor(232,232,232);  // define color encabezado
$pdf->SetFont('Arial','B','12');
$pdf->SetDrawColor(241,241,241);// define color de celdas
$pdf->Cell(18,6,utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(18,6,utf8_decode('Articulo'),1,0,'C',1);
$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
$pdf->Cell(30,6,'Costo unitario',1,0,'C',1);
$pdf->Cell(25,6,'Costo total',1,0,'C',1);
$pdf->Cell(24,6,utf8_decode('Proveedor'),1,0,'C',1);
$pdf->Cell(18,6,utf8_decode('Estado'),1,0,'C',1);
$pdf->Cell(46,6,'Fecha de ingreso',1,1,'C',1);


//$pdf->Cell(46,6,'Fecha anulación',1,1,'C',1);

//Data
$pdf->SetFont('Arial','','10');
$estados1 = "";

while($row=$resultado->fetch_assoc()){

    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(18,6,$row['numero'],1,0,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(18,6,$row['articulo'],1,0,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,6,$row['cantidad'],1,0,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(30,6,number_format($row['costo_unitario'], 0,'$', '.'),1,0,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(25,6,number_format($row['costo_total'], 0,'$', '.'),1,0,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(24,6,$row['nombre'],1,0,'C');
    $pdf->SetTextColor(255, 0, 0);
    $pdf->Cell(18,6,$row['estado'],1,0,'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(46,6,$row['fecha_creacion'],1,1,'C');
    //$pdf->Cell(46,6,$row['fecha_anulacion'],1,1,'C');
}

//salida pdf descargable

//$pdf->Output('I', 'compras.pdf');// Destino, nombre del fichero

$hora = date("d-m-Y");

$pdf->Output('I', 'compras_'.$hora.'.pdf');// Destino, nombre del fichero


