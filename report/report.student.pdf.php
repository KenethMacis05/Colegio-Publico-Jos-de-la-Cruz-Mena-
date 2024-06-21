<?php
require_once "../models/estudiante.model.php";
require_once "../fpdf186/fpdf.php";

$objStudent = new Estudiante();

if (isset($_GET['estudiante'])) {
    try {
        $ID = filter_input(INPUT_GET, 'estudiante', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objStudent->readID($ID);
        $estudiante = mysqli_fetch_assoc($resultado);
        
        /* DATOS DEL ESTUDIANTE */
        $idEstudiante = $estudiante['ID_Estudiante'];
        $primerNombre = $estudiante['Pri_Nombre'];
        $segundoNombre = $estudiante['Seg_Nombre'];
        $primerApellido = $estudiante['Pri_Apellido'];
        $segundoApellido = $estudiante['Seg_Apellido'];
        $fechaNacimiento = $estudiante['Fecha_Nacimiento'];
        $cedula = $estudiante['Cedula'];
        $genero = $estudiante['Genero'];
        $telefono = $estudiante['Telefono'];
        $direccion = $estudiante['Direccion'];
        $correo = $estudiante['Correo_Electronico'];

        /* DATOS DEL TUTOR */
        $primerNombreTutor = $estudiante['priNombreTutor'];
        $segundoNombreTutor = $estudiante['segNombreTutor'];
        $primerApellidoTutor = $estudiante['priApellidoTutor'];
        $segundoApellidoTutor = $estudiante['segApellidoTutor'];

        // Clase PDF extendida para generar el reporte
        class PDF extends FPDF {
            private $watermarkPath;
            //Datos del estudiante
            private $idEstudiante;
            private $primerNombre;
            private $segundoNombre;
            private $primerApellido;
            private $segundoApellido;
            private $fechaNacimiento;
            private $cedula;
            private $genero;
            private $telefono;
            private $direccion;
            private $correo;

            /* DATOS DEL TUTOR */
            private $primerNombreTutor;
            private $segundoNombreTutor;
            private $primerApellidoTutor;
            private $segundoApellidoTutor;

        public function __construct($idEstudiante, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $primerNombreTutor, $segundoNombreTutor, $primerApellidoTutor, $segundoApellidoTutor) {
            parent::__construct('P', 'mm', 'A4');
            $this->watermarkPath = '../src/img/marca.png';
            
            //Datos del estudiante
            $this->idEstudiante = $idEstudiante;
            $this->primerNombre = $primerNombre;
            $this->segundoNombre = $segundoNombre;
            $this->primerApellido = $primerApellido;
            $this->segundoApellido = $segundoApellido;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->cedula = $cedula;
            $this->genero = $genero;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->correo = $correo;

            //Datos del tutor
            $this->primerNombreTutor = $primerNombreTutor; 
            $this->segundoNombreTutor = $segundoNombreTutor; 
            $this->primerApellidoTutor = $primerApellidoTutor; 
            $this->segundoApellidoTutor = $segundoApellidoTutor;
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
            $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Hoja de reporte: Estudiante ' .$this->primerNombre .' '.$this->primerApellido), 0, 0, 'C', 0);        
            $this->Ln(15);

            /* DATOS DEL Estudiante */
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, iconv('UTF-8', 'windows-1252', 'Datos Personales del Estudiante'), 0, 0, 'L', 0);
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
            $this->Cell(47, 10, 'FECHA DE NACIMIENTO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->fechaNacimiento, 0, 0, 'C', 0);
            $this->Cell(47, 10, 'GENERO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->genero), 0, 1, 'C', 0);
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
            
            /* DATOS DEL Tutor */
            $this->Ln(5);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, iconv('UTF-8', 'windows-1252', 'Datos Personales del Tutor'), 0, 0, 'L', 0);
            $this->Ln(10);
            $this->SetFont('Arial', '', 10);        
            $this->Cell(47, 10, 'PRIMER NOMBRE: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->primerNombreTutor), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'SEGUNDO NOMBRE: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->segundoNombreTutor), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'PRIMER APELLIDO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->primerApellidoTutor), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'SEGUNDO APELLIDO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->segundoApellidoTutor), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);            

            /* DATOS DE LAS MATRICULAS */
            $this->Ln(5);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, iconv('UTF-8', 'windows-1252', 'Matrículas del Estudiante'), 0, 0, 'L', 0);
            $this->Ln(10);         
            $this->SetFillColor(15, 23, 42);
            $this->SetTextColor(255, 255, 255); 
            $this->SetFont('Arial', 'B', 10);        
            /* CAMPOS DE LA TABLA */
            $this->SetX(8);            
            $this->Cell(38, 10, 'Codigo de Matricula', 1, 0, 'C', 1);
            $this->Cell(38, 10, 'Grado', 1, 0, 'C', 1);                
            $this->Cell(38, 10, iconv('UTF-8', 'windows-1252', 'Sección'), 1, 0, 'C', 1);        
            $this->Cell(38, 10, 'Turno', 1, 0, 'C', 1);        
            $this->Cell(38, 10, iconv('UTF-8', 'windows-1252', 'Añio'), 1, 1, 'C', 1);                    
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
        }
    }
    
    $objStudent = new Estudiante;
    $allStudent = $objStudent->readID($idEstudiante);
    $numRows = mysqli_num_rows($allStudent);

    $pdf = new PDF($idEstudiante, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $primerNombreTutor, $segundoNombreTutor, $primerApellidoTutor, $segundoApellidoTutor);
    $pdf->SetTitle(iconv('UTF-8', 'windows-1252', 'Reporte de Estudiante'));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 9);

    for ($i = 0; $i < $numRows; $i++) { 
        $student = mysqli_fetch_assoc($allStudent);    
        $pdf->SetX(8);
        $pdf->Cell(38, 10, $student['Cod_Matricula'], 1, 0, 'C', 0);
        $pdf->Cell(38, 10, $student['Grado'], 1, 0, 'C', 0);        
        $pdf->Cell(38, 10, $student['Seccion'], 1, 0, 'C', 0);    
        $pdf->Cell(38, 10, $student['Turno'], 1, 0, 'C', 0);
        $pdf->Cell(38, 10, $student['Anio'], 1, 1, 'C', 0);
    }

    $pdf->Output(iconv('UTF-8', 'windows-1252', 'Hoja de Matrícula de '.$primerNombre.$primerApellido.'.pdf'), 'I');

    } catch (Exception $e) {
        error_log("No se encontraron resultados ". $e->getMessage());
        exit;
    }    
} else {
    echo 'Error en el envió del tutor';
}