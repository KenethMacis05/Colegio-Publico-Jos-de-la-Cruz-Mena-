<?php
require_once "../models/matricula.model.php";
require_once "../fpdf186/fpdf.php";

$objMatricula = new Matricula();

if (isset($_GET['matricula'])) {
    try {
        $ID = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objMatricula->readMatricula($ID);
        $matricula = mysqli_fetch_assoc($resultado);                
        
        // Guarda los datos del usuario en variables
        //Datos de la matrícula
        $idMatricula = $matricula['ID_Matricula'];
        $codigoMatricula = $matricula['Cod_Matricula'];
        $grado = $matricula['Grado'];
        $seccion = $matricula['Seccion'];
        $turno = $matricula['Turno'];
        $estado = $matricula['Estado'];    
        $fechaMatricula = $matricula['Fecha_Matricula'];    
        $anio = $matricula['Anio'];    
        //Datos del estudiante
        $primerNombreEstudiante = $matricula['Pri_Nombre'];
        $segundoNombreEstudiante = $matricula['Seg_Nombre'];
        $primerApellidoEstudiante = $matricula['Pri_Apellido'];
        $segundoApellidoEstudiante = $matricula['Seg_Apellido'];
        $telefono = $matricula['Telefono'];        
        $direccion = $matricula['Direccion'];
        $fechaNacimiento = $matricula['Fecha_Nacimiento'];
        $genero = $matricula['Genero'];
        $cedula = $matricula['Cedula'];
        $correo = $matricula['Correo_Electronico'];
        //Datos del tutor
        $primerNombreTutor = $matricula['Tutor_Pri_Nombre'];
        $segundoNombreTutor = $matricula['Tutor_Seg_Nombre'];
        $primerApellidoTutor = $matricula['Tutor_Pri_Apellido'];
        $segundoApellidoTutor = $matricula['Tutor_Seg_Apellido'];
        $cedulaTutor = $matricula['Tutor_Cedula'];
        $telefonoTutor = $matricula['Tutor_Telefono'];
        $direccionTutor = $matricula['Tutor_Direccion'];
        $correoTutor = $matricula['Tutor_Correo'];
        $parentesco = $matricula['Parentesco'];

        // Clase PDF extendida para generar el reporte
        class PDF extends FPDF {
            private $watermarkPath;
            //Datos de la matrícula
            private $idMatricula;
            private $codigoMatricula;
            private $grado;
            private $seccion;
            private $turno;
            private $estado;    
            private $fechaMatricula;    
            private $anio; 
            //Datos del estudiante
            private $primerNombreEstudiante;
            private $segundoNombreEstudiante;
            private $primerApellidoEstudiante;
            private $segundoApellidoEstudiante;
            private $telefono;                        
            private $direccion;
            private $fechaNacimiento;
            private $genero;
            private $cedula;
            private $correo;
            //Datos del tutor
            private $primerNombreTutor;
            private $segundoNombreTutor;
            private $primerApellidoTutor;
            private $segundoApellidoTutor;
            private $cedulaTutor;
            private $telefonoTutor;
            private $direccionTutor;
            private $correoTutor;
            private $parentesco;

        public function __construct($idMatricula, $codigoMatricula, $telefono, $grado, $turno, $direccion, $estado, $seccion, $fechaMatricula, $anio, $genero, $fechaNacimiento, $cedula, $correo, $cedulaTutor, $telefonoTutor, $direccionTutor, $correoTutor, $parentesco, $primerNombreEstudiante, $segundoNombreEstudiante, $primerApellidoEstudiante, $segundoApellidoEstudiante, $primerNombreTutor, $segundoNombreTutor, $primerApellidoTutor, $segundoApellidoTutor) {
            parent::__construct('P', 'mm', 'A4');
            $this->watermarkPath = '../src/img/marca.png';
            //Datos de la matrícula
            $this->idMatricula = $idMatricula;
            $this->codigoMatricula = $codigoMatricula;
            $this->grado = $grado;
            $this->seccion = $seccion;
            $this->turno = $turno;
            $this->estado = $estado;
            $this->fechaMatricula = $fechaMatricula;
            $this->anio = $anio;
            //Datos del estudiante
            $this->primerNombreEstudiante = $primerNombreEstudiante;
            $this->segundoNombreEstudiante = $segundoNombreEstudiante;
            $this->primerApellidoEstudiante = $primerApellidoEstudiante;
            $this->segundoApellidoEstudiante = $segundoApellidoEstudiante;
            $this->telefono = $telefono;                    
            $this->direccion = $direccion;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->genero = $genero;            
            $this->cedula = $cedula; 
            $this->correo = $correo;
            //Datos del tutor
            $this->primerNombreTutor = $primerNombreTutor;
            $this->segundoNombreTutor = $segundoNombreTutor;
            $this->primerApellidoTutor = $primerApellidoTutor;
            $this->segundoApellidoTutor = $segundoApellidoTutor;
            $this->cedulaTutor = $cedulaTutor;
            $this->telefonoTutor = $telefonoTutor;
            $this->direccionTutor = $direccionTutor;
            $this->correoTutor = $correoTutor;
            $this->parentesco = $parentesco;
        }
        function Header()
        {        
            $this->Image($this->watermarkPath, 50, 30, 250, 250, false, 'T', 45, 45, 0, false, false, false, false);
            /* Imagenes */
            $this->Image('../src/img/logo-negro.png', 10, 8, 40);
            $this->Image('../src/img/logo-mined.png', 85, 8, 40);
            $this->Image('../src/img/logo-inatec.png', 165, 8, 30);
            $this->Image('../src/img/firmas.png', 45, 250, 130);
            
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
            $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Hoja de Matrícula'), 0, 0, 'C', 0);        
            $this->Ln(15);

            // Detalles adicionales de la matrícula
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, iconv('UTF-8', 'windows-1252', 'Detalles de la Matrícula'), 0, 0, 'L', 0);
            $this->Ln(10);
            $this->SetFont('Arial', '', 10);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'CODIGO DE MATRÍCULA:'), 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->codigoMatricula, 0, 0, 'C', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'FECHA DE LA MATRÍCULA:'), 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->fechaMatricula, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(23, 10, iconv('UTF-8', 'windows-1252', 'GRUPO:'), 0, 0, 'L', 0);
            $this->Cell(23, 10, $this->grado. ' '. $this->seccion, 0, 0, 'C', 0);
            $this->Cell(23, 10, iconv('UTF-8', 'windows-1252', 'TURNO:'), 0, 0, 'C', 0);
            $this->Cell(23, 10, $this->turno, 0, 0, 'C', 0);
            $this->Cell(23, 10, iconv('UTF-8', 'windows-1252', 'ESTADO:'), 0, 0, 'C', 0);
            $this->Cell(23, 10, $this->estado, 0, 0, 'C', 0);
            $this->Cell(23, 10, iconv('UTF-8', 'windows-1252', 'AÑIO:'), 0, 0, 'C', 0);
            $this->Cell(23, 10, $this->anio, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(33, $yCurrentPosition - 3, 56, $yCurrentPosition - 3);
            $this->Line(75, $yCurrentPosition - 3, 102, $yCurrentPosition - 3);
            $this->Line(122, $yCurrentPosition - 3, 148, $yCurrentPosition - 3);
            $this->Line(165, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Ln(5);

            /* DATOS DEl ESTUDIANTE */
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, 'Datos Personales del Estudiante', 0, 0, 'L', 0);
            $this->Ln(10);
            $this->SetFont('Arial', '', 10);        
            $this->Cell(47, 10, 'PRIMER NOMBRE: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->primerNombreEstudiante, 0, 0, 'C', 0);
            $this->Cell(47, 10, 'SEGUNDO NOMBRE: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->segundoNombreEstudiante, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'PRIMER APELLIDO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->primerApellidoEstudiante, 0, 0, 'C', 0);
            $this->Cell(47, 10, 'SEGUNDO APELLIDO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->segundoApellidoEstudiante, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'CEDULA: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->cedula, 0, 0, 'C', 0);
            $this->Cell(47, 10, 'FECHA DE NACIMIENTO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->fechaNacimiento, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'SEXO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->genero, 0, 0, 'C', 0);
            $this->Cell(47, 10, 'TELEFONO CELULAR: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->telefono, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'CORREO ELECTRONICO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->correo, 0, 0, 'C', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'DIRECCIÓN DOMICILIAR:'), 0, 0, 'L', 0);
            $this->Cell(47, 10, $this->direccion, 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Ln(5);

            /* DATOS DEL TUTOR */
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
            $this->Cell(47, 10, 'CEDULA: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->cedulaTutor), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'PARENTESCO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->parentesco), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'TELEFONO CELULAR: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->telefonoTutor), 0, 0, 'C', 0);
            $this->Cell(47, 10, 'CORREO ELECTRONICO: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->correoTutor), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
            $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
            $this->Cell(47, 10, 'DIRECCION DOMICILIAR: ', 0, 0, 'L', 0);
            $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->direccionTutor), 0, 1, 'C', 0);
            $yCurrentPosition = $this->GetY();
            $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);

            $this->Image('../src/img/sello.png', 100, 235, 30);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
        }
    }

    $pdf = new PDF($idMatricula, $codigoMatricula, $telefono, $grado, $turno, $direccion, $estado, $seccion, $fechaMatricula, $anio, $genero, $fechaNacimiento, $cedula, $correo, $cedulaTutor, $telefonoTutor, $direccionTutor, $correoTutor, $parentesco, $primerNombreEstudiante, $segundoNombreEstudiante, $primerApellidoEstudiante, $segundoApellidoEstudiante, $primerNombreTutor, $segundoNombreTutor, $primerApellidoTutor, $segundoApellidoTutor);
    $pdf->SetTitle(iconv('UTF-8', 'windows-1252', 'Reporte de Matrícula'));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 9);


    $pdf->Output(iconv('UTF-8', 'windows-1252', 'Hoja de Matrícula de '.$primerNombreEstudiante.'.pdf'), 'I');

    } catch (Exception $e) {
        error_log("No se encontraron resultados ". $e->getMessage());
        exit;
    }    
} else {
    echo 'Error en el envió de la matricula';
}