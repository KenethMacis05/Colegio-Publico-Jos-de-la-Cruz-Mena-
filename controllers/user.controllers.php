<?php 
include_once "../models/conexion.model.php";
include_once "../models/USERS.model.php";

$objUser = new Users();

//Crear
if (isset($_POST['tipo_usuario']) && isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['pri_nombre']) && isset($_POST['seg_nombre']) && isset($_POST['pri_apellido']) && isset($_POST['seg_apellido']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['imagen'])) {
    $tipo = $_POST['tipo_usuario'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $pri_nombre = $_POST['pri_nombre'];
    $seg_nombre = $_POST['seg_nombre'];
    $pri_apellido = $_POST['pri_apellido'];
    $seg_apellido = $_POST['seg_apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $imagen = $_POST['imagen'];

    if ($objUser->create($tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen)) {
        header("Location:../views/users.view.php?create=1");
    } else {
        header("Location:../views/users.view.php?create=0");
    }
}

//Actualizar
if ( isset($_POST['modificaUser']) && isset($_POST['edit_tipo_usuario']) && isset($_POST['edit_usuario']) && isset($_POST['edit_contrasena']) && isset($_POST['edit_pri_nombre']) && isset($_POST['edit_seg_nombre']) && isset($_POST['edit_pri_apellido']) && isset($_POST['edit_seg_apellido']) && isset($_POST['edit_telefono']) && isset($_POST['edit_correo']) && isset($_POST['edit_imagen'])) {
    $id = $_POST['modificaUser'];
    $tipo = $_POST['edit_tipo_usuario'];
    $usuario = $_POST['edit_usuario'];
    $contrasena = $_POST['edit_contrasena'];
    $pri_nombre = $_POST['edit_pri_nombre'];
    $seg_nombre = $_POST['edit_seg_nombre'];
    $pri_apellido = $_POST['edit_pri_apellido'];
    $seg_apellido = $_POST['edit_seg_apellido'];
    $telefono = $_POST['edit_telefono'];
    $correo = $_POST['edit_correo'];
    $imagen = $_POST['edit_imagen'];

    if ($objUser->update($id, $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen)) {
        header("Location:../views/users.view.php?update=1");
    } else {
        header("Location:../views/users.view.php?update=0");       
    }
}

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objUser->delete($ID)? "../views/users.view.php?delete=1" : "../views/users.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}