<?php 
include_once "../models/conexion.model.php";
include_once "../models/USERS.model.php";

$objUser = new Users();

//Create
if (isset($_POST['tipo_usuario']) && isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['pri_nombre']) && isset($_POST['seg_nombre']) && isset($_POST['pri_apellido']) && isset($_POST['seg_apellido']) && isset($_POST['telefono']) && isset($_POST['correo']) &&!empty($_FILES['img']['tmp_name'])) {
    $id = filter_var(trim($_POST['modificaUser']), FILTER_SANITIZE_NUMBER_INT);
    $tipo = filter_var(trim($_POST['tipo_usuario']), FILTER_SANITIZE_NUMBER_INT);
    $usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
    $contrasena = filter_var(trim($_POST['contrasena']), FILTER_SANITIZE_NUMBER_INT);
    $pri_nombre = filter_var(trim($_POST['pri_nombre']), FILTER_SANITIZE_STRING);
    $seg_nombre = filter_var(trim($_POST['seg_nombre']), FILTER_SANITIZE_STRING);
    $pri_apellido = filter_var(trim($_POST['pri_apellido']), FILTER_SANITIZE_STRING);
    $seg_apellido = filter_var(trim($_POST['seg_apellido']), FILTER_SANITIZE_STRING);
    $telefono = filter_var(trim($_POST['telefono']), FILTER_SANITIZE_NUMBER_INT);
    $correo = filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL);
    $imagenBlob = file_get_contents($_FILES['imagen']['tmp_name']);
    
    $resultado = $objUser->create($tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagenBlob);

    if ($config == 1) {
        header("Location: ../views/user.config.view.php?update=1");
        exit;    
    } elseif ($config == 0) {
        header("Location: ../views/users.view.php?update=1");
        exit;    
    }  
}

//Actualizar sin img
if (isset($_POST['modificaUser']) && isset($_POST['tipo_usuario']) && isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['pri_nombre']) && isset($_POST['seg_nombre']) && isset($_POST['pri_apellido']) && isset($_POST['seg_apellido']) && isset($_POST['telefono']) && isset($_POST['correo'])) {
    $id = filter_var(trim($_POST['modificaUser']), FILTER_SANITIZE_NUMBER_INT);
    $tipo = filter_var(trim($_POST['tipo_usuario']), FILTER_SANITIZE_NUMBER_INT);
    $usuario = filter_var(trim($_POST['usuario']), FILTER_SANITIZE_STRING);
    $contrasena = filter_var(trim($_POST['contrasena']), FILTER_SANITIZE_NUMBER_INT);
    $pri_nombre = filter_var(trim($_POST['pri_nombre']), FILTER_SANITIZE_STRING);
    $seg_nombre = filter_var(trim($_POST['seg_nombre']), FILTER_SANITIZE_STRING);
    $pri_apellido = filter_var(trim($_POST['pri_apellido']), FILTER_SANITIZE_STRING);
    $seg_apellido = filter_var(trim($_POST['seg_apellido']), FILTER_SANITIZE_STRING);
    $telefono = filter_var(trim($_POST['telefono']), FILTER_SANITIZE_NUMBER_INT);
    $correo = filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL);
    $config = $_POST['config'];
    
    $resultado = $objUser->updateSinIMG($id, $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo);

    if ($config == 1) {
        header("Location: ../views/user.config.view.php?update=1");
        exit;    
    } elseif ($config == 0) {
        header("Location: ../views/users.view.php?update=1");
        exit;    
    }  
}

//Actualizar img
if (isset($_POST['modificaIMG']) &&!empty($_FILES['img']['tmp_name'])) {
    $ID = filter_input(INPUT_POST, 'modificaIMG', FILTER_SANITIZE_NUMBER_INT);
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $config = $_POST['config'];
    $resultado = $objUser->updateIMG($ID, $img);
    
    if ($config == 1) {
        header("Location: ../views/user.config.view.php?updateIMG=1");
        exit;    
    } elseif ($config == 0) {
        header("Location: ../views/users.view.php?updateIMG=1");
        exit;    
    }
} else {
    echo 'Error';
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

//EliminarIMG
if (isset($_GET['deleteIMG'])) {
    try {
        $ID = filter_input(INPUT_GET, 'deleteIMG', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objUser->deleteIMG($ID)? "../views/user.config.view.php?deleteIMG=1" : "../views/user.config.view.php?deleteIMG=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}