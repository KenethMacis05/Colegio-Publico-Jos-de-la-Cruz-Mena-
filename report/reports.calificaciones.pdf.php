<?php
require_once '../fpdf186/fpdf.php';
require_once '../models/calificaciones.model.php';

$objCalificacion = new Calificacion;
if (isset($_POST['grado']) && isset($_POST['anio'])) {
    try {
        $grado = filter_input(INPUT_POST, 'grado', FILTER_SANITIZE_NUMBER_INT);
        $anio = filter_input(INPUT_POST, 'anio', FILTER_SANITIZE_NUMBER_INT);

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
                $this->Cell(70, 10, 'Reporte de Calificaciones', 0, 0, 'C', 0);        
                $this->Ln(15);         
                $this->SetFillColor(15, 23, 42);
                $this->SetTextColor(255, 255, 255); 
                $this->SetFont('Arial', 'B', 10);        
                /* CAMPOS DE LA TABLA */
                $this->SetX(8);            
                $this->Cell(10, 10, 'ID', 1, 0, 'C', 1);
                $this->Cell(50, 10, 'Estudiante', 1, 0, 'C', 1);
                $this->Cell(34, 10, 'Cedula', 1, 0, 'C', 1);                
                $this->Cell(34, 10, 'Telefono', 1, 0, 'C', 1);        
                $this->Cell(20, 10, 'Grado', 1, 0, 'C', 1);
                $this->Cell(20, 10, 'Promedio', 1, 0, 'C', 1);
                $this->Cell(27, 10, 'Anio', 1, 1, 'C', 1);                
            }
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Pagina '. $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
            }    
        }

        $pdf = new PDF();
        $pdf->SetTitle('Reporte de Calificaciones');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 9);
        
        $allCalificaciones = $objCalificacion->readGradoAnio($grado, $anio);
        $numRows = mysqli_num_rows($allCalificaciones);
             
        for ($i = 0; $i < $numRows; $i++) { 
            $calificacion = mysqli_fetch_assoc($allCalificaciones);
            // Convertir campos individuales del calificacion a utf-8
            $id = iconv('UTF-8', 'windows-1252', $calificacion['ID_Calificacion']);
            $estudiante = iconv('UTF-8', 'windows-1252', $calificacion['Estudiante']);
            $cedula = iconv('UTF-8', 'windows-1252', $calificacion['Cedula']);
            $telefono = iconv('UTF-8', 'windows-1252', $calificacion['Telefono']);
            $grado = iconv('UTF-8', 'windows-1252', $calificacion['Grado']);    
            $anio = iconv('UTF-8', 'windows-1252', $calificacion['Anio_Lectivo']);
            $id_estudiante = $calificacion['FK_Estudiante'];
        
            $promedio = $objCalificacion->promedio($id_estudiante);
        
            // Datos de la tabla
            $pdf->SetX(8);
            $pdf->Cell(10, 10, $id, 1, 0, 'L', 0);
            $pdf->Cell(50, 10, $estudiante, 1, 0, 'L', 0);
            $pdf->Cell(34, 10, $cedula, 1, 0, 'L', 0);        
            $pdf->Cell(34, 10, $telefono, 1, 0, 'L', 0);    
            $pdf->Cell(20, 10, $grado, 1, 0, 'L', 0);
            $pdf->Cell(20, 10, $promedio, 1, 0, 'L', 0);
            $pdf->Cell(27, 10, $anio, 1, 1, 'L', 0);
        }
        
        $pdf->Output('Reportecalificaciones.pdf', 'I');

    } catch (\Throwable $th) {
        
    }
}



?>