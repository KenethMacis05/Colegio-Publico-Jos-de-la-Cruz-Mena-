<?php
include_once("/Programas2/laragon/www/fpdf/fpdf.php");
class PDF extends FPDF
{
    function Header()
    {
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);
        $this->Cell(70, 10, 'Tabla de usuarios ', 0, 0, 'C');
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(8);
        $this->Cell(25, 10, 'Usuario', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Password', 1, 0, 'C', 0,);
        $this->Cell(27, 10, 'Permisos', 1, 0, 'C', 0);
        $this->Cell(27, 10, 'Primer nombre', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Primer apellido', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Telefono', 1, 1, 'C', 0);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$conexion = mysqli_connect("localhost", "root", "", "gestion_escolar_jdlcm");
$consulta = "CALL sp_read_user();";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {

    $pdf->SetX(8);

    $pdf->Cell(25, 10, $row['Usuario'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['Contrasena'], 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['Permisos'], 1, 0, 'C', 0);
    $pdf->Cell(27, 10, $row['Pri_Nombre'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['Pri_Apellido'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['Telefono'], 1, 1, 'C', 0);
}


$pdf->Output();
