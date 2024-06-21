<?php
require_once "../models/tutor.model.php";
require_once "../fpdf186/fpdf.php";

$objTutor = new Tutor();

if (isset($_GET['tutor'])) {
    try {
        $ID = filter_input(INPUT_GET, 'tutor', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objTutor->readTutor($ID);
        $tutor = mysqli_fetch_assoc($resultado);
        
        // Guarda los datos del usuario en variables                
        $idTutor = $tutor['ID_Tutor'];
        $primerNombre = $tutor['Pri_Nombre'];
        $segundoNombre = $tutor['Seg_Nombre'];
        $primerApellido = $tutor['Pri_Apellido'];
        $segundoApellido = $tutor['Seg_Apellido'];
        $cedula = $tutor['Cedula'];
        $telefono = $tutor['Telefono'];
        $direccion = $tutor['Direccion'];
        $correo = $tutor['Correo_Electronico'];

        // Clase PDF extendida para generar el reporte
        class PDF extends FPDF {
            private $watermarkPath;
            //Datos del tutor
            private $idTutor;
            private $primerNombre;
            private $segundoNombre;
            private $primerApellido;
            private $segundoApellido;
            private $cedula;
            private $telefono;
            private $direccion;
            private $correo;

        public function __construct($idTutor, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $cedula, $telefono, $direccion, $correo) {
            parent::__construct('P', 'mm', 'A4');
            $this->watermarkPath = '../src/img/marca.png';
            
            //Datos del tutor
            $this->idTutor = $idTutor;
            $this->primerNombre = $primerNombre;
            $this->segundoNombre = $segundoNombre;
            $this->primerApellido = $primerApellido;
            $this->segundoApellido = $segundoApellido;
            $this->cedula = $cedula;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->correo = $correo;
        }
        function Header()
        {        
            $this->Image($this->watermarkPath, 50, 30, 250, 250, false, 'T', 45, 45, 0, false, false, false, false);
            /* Imagenes */
            $this->Image('../src/img/logo-negro.png', 10, 8, 40);
            $this->Image('../src/img/logo-mined.png', 85, 8, 40);
            $this->Image('../src/img/logo-inatec.png', 165, 8, 30);
            $this->Image('../src/img/firmas.png', 45, 250, 130);
            $this->Image('../src/img/sello.png', 100, 235, 30);
            
            /* CABECERA */
            $this->Ln(20);
            $this->Cell(60);
            $this->SetTextColor(15, 23, 42); 
            $this->SetFont('Arial', 'B', 20);
            $this->Cell(70, 10, 'Colegio Publico', 0, 1, 'C', 0);
            $this->Cell(60);
            $this->SetFont('Arial', 'B', 26);
            $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'José de la Cruz Mena'), 0, 1, 'C', 0);
            $this->Cell(60);
            $this->SetTextColor(219, 161, 5);
            $this->SetFont('Arial', 'BI', 14);
            $this->Cell(70, 10, 'Dios, Patria y Hogar', 0, 0, 'C', 0);

            /* Titulo DE LA TABLA */
            $this->Ln(20); 
            $this->Cell(60);
            $this->SetTextColor(15, 23, 42); 
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Hoja de reporte: Tutor ' .$this->primerNombre .' '.$this->primerApellido), 0, 0, 'C', 0);        
            $this->Ln(15);

            /* DATOS DEL TUTOR */
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, 'Datos Personales del Tutor', 0, 0, 'L', 0);
            $this->Ln(10);
            $this->SetFont('Arial', '', 10);        
            $this->Cell(47, 10, 'PRIMER NOMBRE: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->primerNombre), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'SEGUNDO NOMBRE: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->segundoNombre), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'PRIMER APELLIDO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->primerApellido), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'SEGUNDO APELLIDO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->segundoApellido), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'CEDULA: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->cedula), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'TELEFONO CELULAR: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->telefono), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'DIRECCION DOMICILIAR: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->direccion), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'CORREO ELECTRONICO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->correo), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);

            /* TABLA DE ESTUDIANTES QUE TIENE EL TUTOR */
            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, iconv('UTF-8', 'windows-1252', 'Estudiantes a cargo del Tutor'), 0, 0, 'L', 0);
            $this->Ln(12);
            $this->SetFillColor(15, 23, 42);
            $this->SetTextColor(255, 255, 255); 
            $this->SetFont('Arial', 'B', 10);        
            /* CAMPOS DE LA TABLA */
            $this->SetX(8);            
            $this->Cell(38, 10, 'ID', 1, 0, 'C', 1);
            $this->Cell(38, 10, 'Primer nombre', 1, 0, 'C', 1);
            $this->Cell(38, 10, 'Segundo nombre', 1, 0, 'C', 1);                
            $this->Cell(38, 10, 'Primer apellido', 1, 0, 'C', 1);        
            $this->Cell(38, 10, 'Segundo apellido', 1, 1, 'C', 1);                    
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
        }
    }
    
    $pdf = new PDF($idTutor, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $cedula, $telefono, $direccion, $correo);
    $pdf->SetTitle(iconv('UTF-8', 'windows-1252', 'Reporte de Tutor'));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 9);

    $objTutor = new Tutor;
    $allTutores = $objTutor->readTutor($idTutor);
    $numRows = mysqli_num_rows($allTutores);

    for ($i = 0; $i < $numRows; $i++) {
        $estudiante = mysqli_fetch_assoc($allTutores);
        
        // Convertir campos individuales del estudiante a utf-8
        $idEstudiante = iconv('UTF-8', 'windows-1252', $estudiante['ID_Estudiante']);
        $priNombreEstu = iconv('UTF-8', 'windows-1252', $estudiante['priNombreEstu']);
        $segNombreEstu = iconv('UTF-8', 'windows-1252', $estudiante['segNombreEstu']);
        $priApellidoEstu = iconv('UTF-8', 'windows-1252', $estudiante['priApellidoEstu']);
        $segApellidoEstu = iconv('UTF-8', 'windows-1252', $estudiante['segApellidoEstu']);
        
        // Datos de la tabla
        $pdf->SetX(8);
        $pdf->Cell(38, 10, $idEstudiante, 1, 0, 'L', 0);
        $pdf->Cell(38, 10, $priNombreEstu, 1, 0, 'L', 0);
        $pdf->Cell(38, 10, $segNombreEstu, 1, 0, 'L', 0);
        $pdf->Cell(38, 10, $priApellidoEstu, 1, 0, 'L', 0);
        $pdf->Cell(38, 10, $segApellidoEstu, 1, 1, 'L', 0);
    }
    
    $pdf->Output(iconv('UTF-8', 'windows-1252', 'Reporte del tutor '.$primerNombre.$primerApellido.'.pdf'), 'I');

    } catch (Exception $e) {
        error_log("No se encontraron resultados ". $e->getMessage());
        exit;
    }    
} else {
    echo 'Error en el envió del tutor';
}