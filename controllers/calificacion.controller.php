<?php 
include_once "../models/conexion.model.php";
include_once "../models/calificaciones.model.php";

$objCalificacion = new Calificacion();

if (isset($_POST['modificaCalificacion']) || isset($_POST['FK_Estudiante']) && isset($_POST['FK_Grado']) && isset($_POST['FK_Anio']) && isset($_POST['matematica']) && isset($_POST['lenguaExtranjera']) && isset($_POST['lenguaLiteratura']) && isset($_POST['cienciasNaturales']) && isset($_POST['educacionFisica']) && isset($_POST['quimica']) && isset($_POST['otv']) && isset($_POST['fisica']) && isset($_POST['biologia']) && isset($_POST['historia']) && isset($_POST['geografia']) && isset($_POST['economia']) && isset($_POST['sociologia']) && isset($_POST['eca'])) {
    $id = filter_var(trim($_POST['modificaCalificacion']), FILTER_SANITIZE_NUMBER_INT);
    $estudiante = filter_var(trim($_POST['FK_Estudiante']), FILTER_SANITIZE_NUMBER_INT);
    $anio = filter_var(trim($_POST['FK_Anio']), FILTER_SANITIZE_NUMBER_INT);
    $grado = filter_var(trim($_POST['FK_Grado']), FILTER_SANITIZE_NUMBER_INT);
    $matematica =  filter_var(trim($_POST['matematica']), FILTER_SANITIZE_NUMBER_INT);
    $lenguaExtranjera = filter_var(trim($_POST['lenguaExtranjera']), FILTER_SANITIZE_NUMBER_INT);
    $lenguaLiteratura = filter_var(trim($_POST['lenguaLiteratura']), FILTER_SANITIZE_NUMBER_INT);
    $cienciasNaturales = filter_var(trim($_POST['cienciasNaturales']), FILTER_SANITIZE_NUMBER_INT);
    $educacionFisica = filter_var(trim($_POST['educacionFisica']), FILTER_SANITIZE_NUMBER_INT);
    $quimica = filter_var(trim($_POST['quimica']), FILTER_SANITIZE_NUMBER_INT);
    $otv = filter_var(trim($_POST['otv']), FILTER_SANITIZE_NUMBER_INT);
    $fisica = filter_var(trim($_POST['fisica']), FILTER_SANITIZE_NUMBER_INT);
    $biologia = filter_var(trim($_POST['biologia']), FILTER_SANITIZE_NUMBER_INT);
    $historia = filter_var(trim($_POST['historia']), FILTER_SANITIZE_NUMBER_INT);
    $geografia = filter_var(trim($_POST['geografia']), FILTER_SANITIZE_NUMBER_INT);
    $economia = filter_var(trim($_POST['economia']), FILTER_SANITIZE_NUMBER_INT);
    $sociologia = filter_var(trim($_POST['sociologia']), FILTER_SANITIZE_NUMBER_INT);
    $eca = filter_var(trim($_POST['eca']), FILTER_SANITIZE_NUMBER_INT);

    $params = [$estudiante, $matematica, $lenguaExtranjera, $lenguaLiteratura, $cienciasNaturales, $educacionFisica, $quimica, $otv, $fisica, $biologia, $historia, $geografia, $economia, $sociologia, $eca, $anio, $grado];
    $accion = isset($_POST['modificaCalificacion'])? 'update' : 'create';    
    if ($accion === 'update') {array_unshift($params, $id);}
    $resultado = call_user_func_array([$objCalificacion, $accion], $params) ? "../views/calificaciones.view.php?{$accion}=1" : "../views/calificaciones.view.php?{$accion}=0";
    header("Location: ".$resultado);
    exit;
}

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objCalificacion->delete($ID)? "../views/calificaciones.view.php?delete=1" : "../views/calificaciones.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar la calificacion: ". $e->getMessage());
        exit;
    }
    
}