<?php
session_start();
include_once "../models/conexion.model.php";
include_once "../models/USERS.model.php";

if (![$_POST['usuario']] || ![$_POST['password']]) {
    echo "Datos faltantes";
}

$usuario = strip_tags($_POST['usuario']);
$contrasena = $_POST['password'];

try {
    $objUser = new Users();
    $resultado = $objUser->login($usuario, $contrasena);

        if(mysqli_num_rows($resultado)>0){
            $autenticado = mysqli_fetch_array($resultado);
            $_SESSION['usuarioautenticado'] = $autenticado;
            header("Location: /home.php");
            exit;
        }else {
            echo "error en usuario y/o contraseña";
        }
} catch (Exception $e) {
    echo "Error en la conexión: ". $e->getMessage();
}
