<?php
require_once '../fpdf186/fpdf.php';
require_once '../models/USERS.model.php';

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
        $this->Cell(70, 10, utf8_decode('Reporte de usuarios'), 0, 0, 'C', 0);        
        $this->Ln(15);         
        $this->SetFillColor(15, 23, 42);
        $this->SetTextColor(255, 255, 255); 
        $this->SetFont('Arial', 'B', 10);        
        /* CAMPOS DE LA TABLA */
        $this->SetX(8);            
        $this->Cell(25, 10, 'Usuario', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Password', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Permisos', 1, 0, 'C', 1);
        $this->Cell(54, 10, 'Nombre completo', 1, 0, 'C', 1);
        $this->Cell(50, 10, 'Correo', 1, 0, 'C', 1);
        $this->Cell(20, 10, 'Telefono', 1, 1, 'C', 1);        
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
    }
}

$objUser = new Users;
$allUsers = $objUser->read();
$numRows = mysqli_num_rows($allUsers);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

for ($i = 0; $i < $numRows; $i++) { 
    $user = mysqli_fetch_assoc($allUsers);    
    $pdf->SetX(8);
    $pdf->Cell(25, 10, $user['Usuario'], 1, 0, 'L', 0);
    $pdf->Cell(20, 10, $user['Contrasena'], 1, 0, 'L', 0);
    $pdf->Cell(20, 10, $user['Permisos'], 1, 0, 'L', 0);
    $pdf->Cell(54, 10, $user['Pri_Nombre']. ' '. $user['Seg_Nombre']. ' '. $user['Pri_Apellido']. ' '. $user['Seg_Apellido'], 1, 0, 'L', 0);
    $pdf->Cell(50, 10, $user['Correo_Electronico'], 1, 0, 'L', 0);
    $pdf->Cell(20, 10, $user['Telefono'], 1, 1, 'L', 0);
}

$pdf->Output('ReporteUsuarios.pdf', 'I');