<?php
require_once '../fpdf186/fpdf.php';
require_once '../models/periodoescolar.model.php';

class PDF extends FPDF {
    private $watermarkPath;

    public function __construct($orientation='P', $unit='mm', $size='A4') {
        parent::__construct($orientation, $unit, $size);
        $this->watermarkPath = '../src/img/marca.png';
    }
    function Header()
    {        
        $this->Image($this->watermarkPath, 50, 30, 250, 250, false, 'T', 45, 45, 0, false, false, false, false);
        /* Imagenes */
        $this->Image('../src/img/logo-negro.png', 10, 8, 40);
        $this->Image('../src/img/logo-mined.png', 85, 8, 40);
        $this->Image('../src/img/logo-inatec.png', 165, 8, 30);
        $this->Image('../src/img/firmas.png', 45, 250, 130);
        $this->Image('../src/img/sello.png', 80, 210, 40);
        /* CABECERA */
        $this->Ln(20);
        $this->Cell(60);
        $this->SetTextColor(15, 23, 42); 
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(70, 10, utf8_decode('Colegio Publico'), 0, 1, 'C', 0);
        $this->Cell(60);
        $this->SetFont('Arial', 'B', 26);
        $this->Cell(70, 10, utf8_decode('José de la Cruz Mena'), 0, 1, 'C', 0);
        $this->Cell(60);
        $this->SetTextColor(219, 161, 5);
        $this->SetFont('Arial', 'BI', 14);
        $this->Cell(70, 10, utf8_decode('Dios, Patria y Hogar'), 0, 0, 'C', 0);
        /* Titulo DE LA TABLA */
        $this->Ln(20); 
        $this->Cell(60);
        $this->SetTextColor(15, 23, 42); 
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(70, 10, utf8_decode('Reporte de Periodos Escolar'), 0, 0, 'C', 0);        
        $this->Ln(15);         
        $this->SetFillColor(15, 23, 42);
        $this->SetTextColor(255, 255, 255); 
        $this->SetFont('Arial', 'B', 10);        
        /* CAMPOS DE LA TABLA */
        $this->SetX(8);            
        $this->Cell(38, 10, 'ID', 1, 0, 'C', 1);
        $this->Cell(38, 10, utf8_decode('Añio'), 1, 0, 'C', 1);
        $this->Cell(38, 10, 'Fecha de Inicio', 1, 0, 'C', 1);
        $this->Cell(38, 10, 'Fecha Final', 1, 0, 'C', 1);
        $this->Cell(38, 10, 'Estado', 1, 1, 'C', 1);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
    }
}

$objPeriodo = new PeriodoEscolar;
$allPeriodos = $objPeriodo->read();
$numRows = mysqli_num_rows($allPeriodos);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

for ($i = 0; $i < $numRows; $i++) { 
    $periodo = mysqli_fetch_assoc($allPeriodos);
    $pdf->SetX(8);
    $pdf->Cell(38, 10, $periodo['ID_Anio_Lectivo'], 1, 0, 'L', 0);
    $pdf->Cell(38, 10, $periodo['Anio'], 1, 0, 'L', 0);
    $pdf->Cell(38, 10, $periodo['Fecha_Inicio'], 1, 0, 'L', 0);
    $pdf->Cell(38, 10, $periodo['Fecha_Final'], 1, 0, 'L', 0);
    $pdf->Cell(38, 10, $periodo['Estado'], 1, 1, 'L', 0);    
}

$pdf->Output('ReportePeriodosEscolares.pdf', 'I');