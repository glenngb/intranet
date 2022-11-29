<?php
session_start();// se agrega para subor al hosting
include('reportegeneral.php'); // Referencia a la plantilla

$pdf = new PDF(); // 3 parametro, orientacion(P vertical. L horizontal) unidad de medida, formato personalizado
$pdf->AddPage(); //3 parametros Orientacion , tamañoy rotacion
$pdf->AliasNbPages();
$pdf->Image('logo_cokase.png',10,10,-300);
$pdf->SetFont('Arial', 'B', 18); //3 parametros, famila de fuente, estilo(B,I,U), tamaño 
$pdf->Cell(0, 12, 'Hola Glenn', 0, 1, 'C'); //ancho celda ,alto celda, textoa mostrar, borde, salto de linea, alineacion(L,C,R),color de fondo
$pdf->SetFont('Arial', '', 12);
for ($i = 1; $i <= 80; $i++) {
    $pdf->Cell(120, 12, 'Estas son otras lineas', 0, 1,);
}
$pdf->Output('I', 'nombre_reporte.pdf');// Destino, nombre del fichero
?>