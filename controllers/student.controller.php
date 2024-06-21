<?php 
include_once "../models/conexion.model.php";
include_once "../models/estudiante.model.php";

$objEstudiante = new Estudiante();

if (isset($_POST['modificaStudent']) || isset($_POST['priNombre']) && isset($_POST['segNombre']) && isset($_POST['priApellido']) && isset($_POST['segApellido']) && isset($_POST['cedula']) && isset($_POST['fechaNacimiento']) && isset($_POST['genero']) && isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['correo']) && isset($_POST['fkTutor']) && isset($_POST['fkParentesco'])) {
    $id = filter_var(trim($_POST['modificaStudent']), FILTER_SANITIZE_NUMBER_INT);
    $priNombre = filter_var($_POST['priNombre'], FILTER_SANITIZE_STRIPPED);
    $segNombre = filter_var($_POST['segNombre'], FILTER_SANITIZE_STRIPPED);
    $priApellido = filter_var($_POST['priApellido'], FILTER_SANITIZE_STRIPPED);
    $segApellido = filter_var($_POST['segApellido'], FILTER_SANITIZE_STRIPPED);
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRIPPED);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $_POST['fechaNacimiento'])->format('Y-m-d');
    $cedula = filter_var($_POST['cedula'], FILTER_SANITIZE_STRING);
    $genero = filter_var($_POST['genero'], FILTER_SANITIZE_NUMBER_INT);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $fkTutor = filter_var($_POST['fkTutor'], FILTER_SANITIZE_NUMBER_INT);
    $fkParentesco = filter_var($_POST['fkParentesco'], FILTER_SANITIZE_NUMBER_INT);

    $params = [$priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor, $fkParentesco];
    $accion = isset($_POST['modificaStudent'])? 'update' : 'create';    
    if ($accion === 'update') {array_unshift($params, $id);}
    $resultado = call_user_func_array([$objEstudiante, $accion], $params) ? "../views/student.view.php?{$accion}=1" : "../views/student.view.php?{$accion}=0";
    header("Location: ".$resultado);
    exit;
}

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objEstudiante->delete($ID)? "../views/student.view.php?delete=1" : "../views/student.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}
?>