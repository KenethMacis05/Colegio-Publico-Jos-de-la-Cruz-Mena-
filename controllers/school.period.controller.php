<?php
require_once "../models/conexion.model.php";
require_once "../models/periodoescolar.model.php";

$objPeriodoEscolar = new PeriodoEscolar();

if (isset($_POST['modificaPeriodo']) || isset($_POST['estado']) && isset($_POST['anio']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
    $id = filter_var(trim($_POST['modificaPeriodo']), FILTER_SANITIZE_NUMBER_INT);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $anio = filter_input(INPUT_POST, 'anio', FILTER_SANITIZE_NUMBER_INT);
    $fecha_inicio = filter_input(INPUT_POST, 'fecha_inicio', FILTER_SANITIZE_STRING);
    $fecha_final = filter_input(INPUT_POST, 'fecha_final', FILTER_SANITIZE_STRING);

    $params = [$anio, $fecha_inicio, $fecha_final, $estado];
    $accion = isset($_POST['modificaPeriodo'])? 'update' : 'create';    
    if ($accion === 'update') {array_unshift($params, $id);}
    $resultado = call_user_func_array([$objPeriodoEscolar, $accion], $params) ? "../views/school_period.view.php?{$accion}=1" : "../views/school_period.view.php?{$accion}=0";
    header("Location: ".$resultado);
    exit;
}

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objPeriodoEscolar->delete($ID)? "../views/school_period.view.php?delete=1" : "../views/school_period.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}