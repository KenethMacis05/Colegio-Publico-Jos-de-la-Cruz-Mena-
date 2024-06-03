<?php 
include_once "../models/conexion.model.php";
include_once "../models/tutor.model.php";

$objTutor = new Tutor();

if (isset($_POST['modificaTutor']) || isset($_POST['priNombre']) && isset($_POST['segNombre']) && isset($_POST['priApellido']) && isset($_POST['segApellido']) && isset($_POST['cedula']) && isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['correo'])) {
    $id = filter_var(trim($_POST['modificaTutor']), FILTER_SANITIZE_NUMBER_INT);
    $pri_nombre = filter_var(trim($_POST['priNombre']), FILTER_SANITIZE_STRING);
    $seg_nombre = filter_var(trim($_POST['segNombre']), FILTER_SANITIZE_STRING);
    $pri_apellido = filter_var(trim($_POST['priApellido']), FILTER_SANITIZE_STRING);
    $seg_apellido = filter_var(trim($_POST['segApellido']), FILTER_SANITIZE_STRING);
    $cedula = filter_var(trim($_POST['cedula']), FILTER_SANITIZE_STRING);
    $telefono = filter_var(trim($_POST['telefono']), FILTER_SANITIZE_NUMBER_INT);
    $direccion = filter_var(trim($_POST['direccion']), FILTER_SANITIZE_STRING);
    $correo = filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL);

    $params = [$pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $cedula, $telefono, $direccion, $correo];
    $accion = isset($_POST['modificaTutor'])? 'update' : 'create';    
    if ($accion === 'update') {array_unshift($params, $id);}
    $resultado = call_user_func_array([$objTutor, $accion], $params) ? "../views/tutor.view.php?{$accion}=1" : "../views/tutor.view.php?{$accion}=0";
    header("Location: ".$resultado);
    exit;
}

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objTutor->delete($ID)? "../views/tutor.view.php?delete=1" : "../views/tutor.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}