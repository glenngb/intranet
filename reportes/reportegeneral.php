<?php
//session_start();// se agrega para subor al hosting
require('../includes/fpdf/fpdf.php'); 

class PDF extends FPDF
{
    function Header()
    {

        $this->SetFont('Arial', 'BU', 16);
        // Move to the right
        $this->Cell(80);
        // Framed title
        $this->Cell(30, 10, 'Atarraya', 0, 1, 'C');
       
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80);
        $this->Cell(30, 10, utf8_decode('Artículos '), 0, 1, 'C');
        // Line break
        $this->Ln(10);
        $this->Cell(199,10,'Fecha: '.date('d/m/Y'),0,1,'R');
        
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 12);
        // Print centered page number
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }
}



