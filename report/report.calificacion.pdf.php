<?php
require_once "../models/calificaciones.model.php";
require_once "../fpdf186/fpdf.php";

$objCalificacion = new Calificacion();

if (isset($_GET['calificacion'])) {
    try {
        $ID = filter_input(INPUT_GET, 'calificacion', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objCalificacion->readID($ID);
        $calificacion = mysqli_fetch_assoc($resultado);

        // Guarda los datos del usuario en variables                
        $idcalificacion = $calificacion['ID_Calificacion'];
        $estudiante = $calificacion['Estudiante'];
        $cedula = $calificacion['Cedula'];
        $telefono = $calificacion['Telefono'];
        $grado = $calificacion['Grado'];
        $anio = $calificacion['Anio_Lectivo'];
        $matematica = $calificacion['Matematica'];
        $lenguaExtranjera = $calificacion['Lengua_Extranjera'];
        $lenguaLiteratura = $calificacion['Lengua_Literatura'];
        $cienciasNaturales = $calificacion['Ciencias_Naturales'];
        $educacionFisica = $calificacion['Educacion_Fisica'];
        $quimica = $calificacion['Quimica'];
        $otv = $calificacion['OTV'];
        $fisica = $calificacion['Fisica'];
        $biologia = $calificacion['Biologia'];
        $historia = $calificacion['Historia'];
        $geografia = $calificacion['Geografia'];
        $economia = $calificacion['Economia'];
        $sociologia = $calificacion['Sociologia'];
        $eca = $calificacion['ECA'];
        $promedio = $objCalificacion->promedio($calificacion['FK_Estudiante']);

        // Clase PDF extendida para generar el reporte
        class PDF extends FPDF
        {
            private $watermarkPath;
            //Datos de la calificación
            private $idcalificacion;
            private $estudiante;
            private $cedula;
            private $telefono;
            private $grado;
            private $anio;
            private $matematica;
            private $lenguaExtranjera;
            private $lenguaLiteratura;
            private $cienciasNaturales;
            private $educacionFisica;
            private $quimica;
            private $otv;
            private $fisica;
            private $biologia;
            private $historia;
            private $geografia;
            private $economia;
            private $sociologia;
            private $eca;
            private $promedio;


            public function __construct($idcalificacion, $estudiante, $cedula, $telefono, $grado, $anio, $matematica, $lenguaExtranjera, $lenguaLiteratura, $cienciasNaturales, $educacionFisica, $quimica, $otv, $fisica, $biologia, $historia, $geografia, $economia, $sociologia, $eca, $promedio)
            {
                parent::__construct('P', 'mm', 'A4');
                $this->watermarkPath = '../src/img/marca.png';

                //Datos de la calificación
                $this->idcalificacion = $idcalificacion;
                $this->estudiante = $estudiante;
                $this->cedula = $cedula;
                $this->telefono = $telefono;
                $this->grado = $grado;
                $this->anio = $anio;
                $this->matematica = $matematica;
                $this->lenguaExtranjera = $lenguaExtranjera;
                $this->lenguaLiteratura = $lenguaLiteratura;
                $this->cienciasNaturales = $cienciasNaturales;
                $this->educacionFisica = $educacionFisica;
                $this->quimica = $quimica;
                $this->otv = $otv;
                $this->fisica = $fisica;
                $this->biologia = $biologia;
                $this->historia = $historia;
                $this->geografia = $geografia;
                $this->economia = $economia;
                $this->sociologia = $sociologia;
                $this->eca = $eca;
                $this->promedio = $promedio;
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
                $this->Cell(70, 10, iconv('UTF-8', 'windows-1252', 'Hoja de reporte: Calificación ' . $this->estudiante), 0, 0, 'C', 0);
                $this->Ln(15);

                /* DATOS DE LA CALIFICACIÓN */
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(190, 10, 'Datos Personales del Estudiante', 0, 0, 'L', 0);
                $this->Ln(10);
                $this->SetFont('Arial', '', 10);
                $this->Cell(47, 10, 'NOMBRE COMPLETO: ', 0, 0, 'L', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->estudiante), 0, 0, 'C', 0);
                $this->Cell(47, 10, 'CEDULA: ', 0, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->cedula), 0, 1, 'C', 0);
                $yCurrentPosition = $this->GetY();
                $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
                $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
                $this->Cell(47, 10, 'TELEFONO CELULAR: ', 0, 0, 'L', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->telefono), 0, 0, 'C', 0);
                $this->Cell(47, 10, 'GRADO: ', 0, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->grado), 0, 1, 'C', 0);
                $yCurrentPosition = $this->GetY();
                $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
                $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'AÑO:'), 0, 0, 'L', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->anio), 0, 0, 'C', 0);
                $this->Cell(47, 10, 'PROMEDIO: ', 0, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', $this->promedio), 0, 1, 'C', 0);
                $yCurrentPosition = $this->GetY();
                $this->Line(53, $yCurrentPosition - 3, 100, $yCurrentPosition - 3);
                $this->Line(150, $yCurrentPosition - 3, 200, $yCurrentPosition - 3);

                /* TABLA DE CALIFICACIONES */
                $this->Ln(10);
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(190, 10, iconv('UTF-8', 'windows-1252', 'Notas del Estudiante'), 0, 0, 'L', 0);
                $this->Ln(12);

                // Filas de la tabla
                $this->SetFont('Arial', '', 10);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Matemática'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->matematica, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Lengua Extranjera'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->lenguaExtranjera, 1, 1, 'C', 0);

                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Lengua Y Literatura'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->lenguaLiteratura, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Ciencias Naturales'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->cienciasNaturales, 1, 1, 'C', 0);

                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Educación Física'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->educacionFisica, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Química'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->quimica, 1, 1, 'C', 0);

                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'OTV'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->otv, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Física'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->fisica, 1, 1, 'C', 0);

                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Biología'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->biologia, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Historia'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->historia, 1, 1, 'C', 0);

                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Geografía'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->geografia, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Economía'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->economia, 1, 1, 'C', 0);

                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'Sociología'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->sociologia, 1, 0, 'C', 0);
                $this->Cell(47, 10, iconv('UTF-8', 'windows-1252', 'ECA'), 1, 0, 'L', 0);
                $this->Cell(47, 10, $this->eca, 1, 1, 'C', 0);
            }
            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página ') . $this->PageNo() . '/{nb} | Fecha: ' . date('d/m/Y'), 0, 0, 'C');
            }
        }

        $pdf = new PDF($idcalificacion, $estudiante, $cedula, $telefono, $grado, $anio, $matematica, $lenguaExtranjera, $lenguaLiteratura, $cienciasNaturales, $educacionFisica, $quimica, $otv, $fisica, $biologia, $historia, $geografia, $economia, $sociologia, $eca, $promedio);
        $pdf->SetTitle(iconv('UTF-8', 'windows-1252', 'Reporte de Calificación'));
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 9);

        $pdf->Output(iconv('UTF-8', 'windows-1252', 'Reporte del calificación ' . $estudiante . '.pdf'), 'I');
    } catch (Exception $e) {
        error_log("No se encontraron resultados " . $e->getMessage());
        exit;
    }
} else {
    echo 'Error en el envió de la calificación';
}
