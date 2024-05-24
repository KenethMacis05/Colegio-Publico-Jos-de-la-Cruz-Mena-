<?php 
include_once "../models/conexion.model.php";
include_once "../models/USERS.model.php";

$objUser = new Users();

#Crear usuario
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
        header("Location:../views/users.view.php?crear=1");
    } else {
        header("Location:../views/users.view.php?crear=2");
    }
}
#Modificar usuario
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
        echo $id, $tipo, $usuario, $contrasena, $pri_nombre;  
    }
}

#Eliminar usuario
if (isset($_GET['delete_user'])) {
    $id_user = filter_input(INPUT_GET, 'delete_user', FILTER_SANITIZE_NUMBER_INT);
    echo $id_user;
    if ($objUser->delete($id_user)) {
        header("Location:../views/users.view.php?eliminar=1");
    } else {
        #header("Location:../views/users.view.php?eliminar=0");
    }
}
?>
