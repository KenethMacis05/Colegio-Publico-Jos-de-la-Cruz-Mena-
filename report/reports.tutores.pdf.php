<?php
require_once '../fpdf186/fpdf.php';
require_once '../models/tutor.model.php';

class PDF extends FPDF {
    private $watermarkPath;

    public function __construct($orientation='P', $unit='mm', $size='A4') {
        parent::__construct($orientation, $unit, $size);
        $this->watermarkPath = '../src/img/marca.png';
    }
    function Header()
    {
        $header = iconv('UTF-8', 'windows-1252', 'José de la Cruz Mena');
        
        $this->Image($this->watermarkPath, 50, 30, 250, 250, false, 'T', 45, 45, 0, false, false, false, false);
        /* Imagenes */
        $this->Image('../src/img/logo-negro.png', 10, 8, 40);
        $this->Image('../src/img/logo-mined.png', 85, 8, 40);
        $this->Image('../src/img/logo-inatec.png', 165, 8, 30);
        $this->Image('../src/img/firmas.png', 45, 250, 130);
        $this->Image('../src/img/sello.png', 80, 240, 30);
        /* CABECERA */
        $this->Ln(20);
        $this->Cell(60);
        $this->SetTextColor(15, 23, 42); 
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(70, 10, 'Colegio Publico', 0, 1, 'C', 0);
        $this->Cell(60);
        $this->SetFont('Arial', 'B', 26);
        $this->Cell(70, 10, $header, 0, 1, 'C', 0);
        $this->Cell(60);
        $this->SetTextColor(219, 161, 5);
        $this->SetFont('Arial', 'BI', 14);
        $this->Cell(70, 10, 'DIOS, PATRIA Y HOGAR', 0, 0, 'C', 0);
        /* Titulo DE LA TABLA */
        $this->Ln(20); 
        $this->Cell(60);
        $this->SetTextColor(15, 23, 42); 
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(70, 10, 'Reporte de Tutores', 0, 0, 'C', 0);        
        $this->Ln(15);         
        $this->SetFillColor(15, 23, 42);
        $this->SetTextColor(255, 255, 255); 
        $this->SetFont('Arial', 'B', 10);        
        /* CAMPOS DE LA TABLA */
        $this->SetX(8);            
        $this->Cell(10, 10, 'ID', 1, 0, 'C', 1);
        $this->Cell(52, 10, 'Nombre Completo', 1, 0, 'C', 1);
        $this->Cell(25, 10, 'Cedula', 1, 0, 'C', 1);                
        $this->Cell(17, 10, 'Telefono', 1, 0, 'C', 1);        
        $this->Cell(37, 10, 'Direccion', 1, 0, 'C', 1);        
        $this->Cell(54, 10, 'Correo', 1, 1, 'C', 1);        
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina '. $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
    }
}

$objTutor = new Tutor;
$allTutores = $objTutor->read();
$numRows = mysqli_num_rows($allTutores);

$pdf = new PDF();
$pdf->SetTitle(iconv('UTF-8', 'windows-1252', 'Reporte de Tutores'));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

for ($i = 0; $i < $numRows; $i++) { 
    $tutor = mysqli_fetch_assoc($allTutores);
    // Convertir campos individuales del tutor a utf-8
    $idTutor = iconv('UTF-8', 'windows-1252', $tutor['ID_Tutor']);
    $fullName = iconv('UTF-8', 'windows-1252', $tutor['Pri_Nombre']. ' '. $tutor['Seg_Nombre']. ' '. $tutor['Pri_Apellido']. ' '. $tutor['Seg_Apellido']);
    $cedula = iconv('UTF-8', 'windows-1252', $tutor['Cedula']);
    $telefono = iconv('UTF-8', 'windows-1252', $tutor['Telefono']);
    $direccion = iconv('UTF-8', 'windows-1252', $tutor['Direccion']);
    $correoElectronico = iconv('UTF-8', 'windows-1252', $tutor['Correo_Electronico']);

    // Datos de la tabla
    $pdf->SetX(8);
    $pdf->Cell(10, 10, $idTutor, 1, 0, 'L', 0);
    $pdf->Cell(52, 10, $fullName, 1, 0, 'L', 0);
    $pdf->Cell(25, 10, $cedula, 1, 0, 'L', 0);        
    $pdf->Cell(17, 10, $telefono, 1, 0, 'L', 0);    
    $pdf->Cell(37, 10, $direccion, 1, 0, 'L', 0);
    $pdf->Cell(54, 10, $correoElectronico, 1, 1, 'L', 0);
}


$pdf->Output('ReporteTutores.pdf', 'I');