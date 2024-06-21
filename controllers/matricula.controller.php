<?php
include_once "../models/conexion.model.php";
include_once "../models/matricula.model.php";

$objMatricula = new Matricula();

// Crear
if (isset($_POST['modificaMatricula']) || isset($_POST['Cod_Matricula']) && isset($_POST['FK_Estudiante']) && isset($_POST['FK_Grado']) && isset($_POST['FK_Seccion']) && isset($_POST['FK_Turno']) && isset($_POST['FK_Estado']) && isset($_POST['anio']) && isset($_POST['Fecha_Matricula'])) {
    $id = $_POST['modificaMatricula'];
    $codMatricula = $_POST['Cod_Matricula'];
    $fkEstudiante = $_POST['FK_Estudiante'];
    $fkGrado = $_POST['FK_Grado'];
    $fkSeccion = $_POST['FK_Seccion'];
    $fkTurno = $_POST['FK_Turno'];
    $fkEstado = $_POST['FK_Estado'];
    $fkAnioLectivo = $_POST['anio'];
    $fechaMatricula = $_POST['Fecha_Matricula'];

    $params = [$codMatricula, $fkEstudiante, $fkGrado, $fkSeccion, $fkTurno, $fkEstado, $fkAnioLectivo, $fechaMatricula];
    $accion = isset($_POST['modificaMatricula'])? 'update' : 'create';
    if ($accion === 'update') {array_unshift($params, $id);}
    $resultado = call_user_func_array([$objMatricula, $accion], $params)? "../views/registration.view.php?{$accion}=1" : "../views/registration.view.php?{$accion}=0";
    header("Location: ".$resultado);
    exit;
}

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objMatricula->delete($ID)? "../views/registration.view.php?delete=1" : "../views/registration.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}

//Buscar reporte
if (isset($_POST['reportPDF']) || isset($_POST['reportEXCEL'])) {
    try {
        $grado = filter_input(INPUT_POST, 'grado', FILTER_SANITIZE_NUMBER_INT);
        $anio = filter_input(INPUT_POST, 'anio', FILTER_SANITIZE_NUMBER_INT);
        $params = [$grado, $anio];
        $resultado = $objMatricula->readGradoAnio($grado, $anio);

        if (isset($_POST['reportPDF'])) {
            header("Location: ../report/reports.matriculas.pdf.php?datos=$params");
            exit;
        } elseif (isset($_POST['reportEXCEL'])){
            header("Location: ../report/reports.matriculas.excel.php?datos=$resultado");
            exit;
        }
        
    } catch (Exception $e) {
        error_log("Error al realizar la consulta: ". $e->getMessage());
        exit;
    }
}