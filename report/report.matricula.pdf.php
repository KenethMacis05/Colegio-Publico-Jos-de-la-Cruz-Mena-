<?php
include_once "../models/conexion.model.php";
include_once "../models/matricula.model.php";
require_once("../fpdf186/fpdf.php");

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
        $nombreCompleto = $matricula['Pri_Nombre']. " ". $matricula['Seg_Nombre']. " ". $matricula['Pri_Apellido']. " ". $matricula['Seg_Apellido'];
        $telefono = $matricula['Telefono'];        
        $direccion = $matricula['Direccion'];
        $fechaNacimiento = $matricula['Fecha_Nacimiento'];
        $genero = $matricula['Genero'];
        $cedula = $matricula['Cedula'];
        $correo = $matricula['Correo_Electronico'];
        //Datos del tutor
        $tutor = $matricula['Tutor_Pri_Nombre']. " ". $matricula['Tutor_Seg_Nombre']. " ". $matricula['Tutor_Pri_Apellido']. " ". $matricula['Tutor_Seg_Apellido'];
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
            private $nombreCompleto;
            private $telefono;                        
            private $direccion;
            private $fechaNacimiento;
            private $genero;
            private $cedula;
            private $correo;
            //Datos del tutor
            private $tutor;
            private $cedulaTutor;
            private $telefonoTutor;
            private $direccionTutor;
            private $correoTutor;
            private $parentesco;

        public function __construct($idMatricula, $codigoMatricula, $nombreCompleto, $telefono, $grado, $turno, $direccion, $tutor, $estado, $seccion, $fechaMatricula, $anio, $genero, $fechaNacimiento, $cedula, $correo, $cedulaTutor, $telefonoTutor, $direccionTutor, $correoTutor, $parentesco) {
            parent::__construct('P', 'mm', 'A4');
            $this->watermarkPath = 'E:/Programas2/laragon/www/src/img/marca.png';
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
            $this->nombreCompleto = $nombreCompleto;
            $this->telefono = $telefono;                    
            $this->direccion = $direccion;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->genero = $genero;            
            $this->cedula = $cedula; 
            $this->correo = $correo;
            //Datos del tutor
            $this->tutor = $tutor;
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
            $this->Image('E:/Programas2/laragon/www/src/img/logo-negro.png', 10, 8, 40);
            $this->Image('E:/Programas2/laragon/www/src/img/logo-mined.png', 85, 8, 40);
            $this->Image('E:/Programas2/laragon/www/src/img/logo-inatec.png', 165, 8, 30);
            $this->Image('E:/Programas2/laragon/www/src/img/firmas.png', 45, 250, 130);
            $this->Image('E:/Programas2/laragon/www/src/img/sello.png', 80, 210, 40);
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
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(70, 10, utf8_decode('Hoja de Matrícula'), 0, 0, 'C', 0);        
            $this->Ln(15);
            /* DATOS DEl ESTUDIANTE */
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, utf8_decode('Datos Personales del estudiante'), 0, 0, 'L', 0);
            $this->Ln(8);
            $this->SetFont('Arial', '', 10);        
            $this->Cell(63, 10, utf8_decode('Nombre: '.$this->nombreCompleto), 0, 0, 'L', 0);            
            $this->Cell(63, 10, utf8_decode('Cedula: '.$this->cedula), 0, 0, 'L', 0);
            $this->Cell(63, 10, utf8_decode('Fecha de Nacimiento: '.$this->fechaNacimiento), 0, 0, 'L', 0);
            $this->Ln(6);
            $this->Cell(63, 10, utf8_decode('Genero: '.$this->genero), 0, 0, 'L', 0);            
            $this->Cell(63, 10, utf8_decode('Teléfono: '.$this->telefono), 0, 0, 'L', 0);
            $this->Cell(63, 10, utf8_decode('Dirección: '.$this->direccion), 0, 0, 'L', 0);
            $this->Ln(6);
            $this->Cell(63, 10, utf8_decode('Correo Electrónico: '.$this->correo), 0, 0, 'L', 0);            
            $this->Ln(10);
            /* DATOS DEL TUTOR */
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, utf8_decode('Datos Personales del Tutor'), 0, 0, 'L', 0);
            $this->Ln(8);
            $this->SetFont('Arial', '', 10);        
            $this->Cell(63, 10, utf8_decode('Nombre: '.$this->tutor), 0, 0, 'L', 0);            
            $this->Cell(63, 10, utf8_decode('Cedula: '.$this->cedulaTutor), 0, 0, 'L', 0);
            $this->Cell(63, 10, utf8_decode('Teléfono: '.$this->telefonoTutor), 0, 0, 'L', 0);
            $this->Ln(6);
            $this->Cell(63, 10, utf8_decode('Dirección: '.$this->direccionTutor), 0, 0, 'L', 0);            
            $this->Cell(63, 10, utf8_decode('Parentesco: '.$this->parentesco), 0, 0, 'L', 0);            
            $this->Cell(63, 10, utf8_decode('Correo: '.$this->correoTutor), 0, 0, 'L', 0);            
            $this->Ln(10);
            // Detalles adicionales de la matrícula
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(190, 10, utf8_decode('Detalles de la Matrícula'), 0, 0, 'L', 0);
            $this->Ln(8);
            $this->SetFont('Arial', '', 10);        
            $this->Cell(55, 10, utf8_decode('Codigo de la matrícula: '.$this->codigoMatricula), 0, 0, 'L', 0);
            $this->Cell(30, 10, utf8_decode('Grado: '.$this->grado), 0, 0, 'C', 0);
            $this->Cell(30, 10, utf8_decode('Sección: '.$this->seccion), 0, 0, 'L', 0);
            $this->Cell(30, 10, utf8_decode('Turno: '.$this->turno), 0, 0, 'L', 0);
            $this->Cell(30, 10, utf8_decode('Estado: '.$this->estado), 0, 0, 'L', 0);
            $this->Ln(6);
            $this->Cell(61, 10, utf8_decode('Fecha de la matrícula: '.$this->fechaMatricula), 0, 0, 'L', 0);
            $this->Cell(129, 10, utf8_decode('Año: '.$this->anio), 0, 0, 'L', 0);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página '). $this->PageNo(). '/{nb} | Fecha: '. date('d/m/Y'), 0, 0, 'C');
        }
    }

    $pdf = new PDF($idMatricula, $codigoMatricula, $nombreCompleto, $telefono, $grado, $turno, $direccion, $tutor, $estado, $seccion, $fechaMatricula, $anio, $genero, $fechaNacimiento, $cedula, $correo, $cedulaTutor, $telefonoTutor, $direccionTutor, $correoTutor, $parentesco);

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 9);


    $pdf->Output(utf8_decode('Hoja de Matrícula de '.$nombreCompleto.'.pdf'), 'I');

    } catch (Exception $e) {
        error_log("No se encontraron resultados ". $e->getMessage());
        exit;
    }    
} else {
    echo 'Error en el envió de la matricula';
}