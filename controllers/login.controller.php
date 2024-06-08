<?php
session_start();
include_once "../models/conexion.model.php";
include_once "../models/USERS.model.php";

$objConexion = new Conexion();

if (!isset($_POST['usuario'], $_POST['password'])) {
    echo "Datos faltantes";
}

$usuario = strip_tags($_POST['usuario']);
$contrasena = $_POST['password'];
$recordarme = isset($_POST['recordarme']) ? true : false;

try {
    $objUser = new Users();
    $resultado = $objUser->login($usuario, $contrasena);

    if (mysqli_num_rows($resultado) > 0) {
        $autenticado = mysqli_fetch_array($resultado);
        $_SESSION['usuarioautenticado'] = $autenticado;

        // Obtener el año escolar activo
        $query = "SELECT * FROM Anio_Lectivo WHERE Estado = 'Activo';";
        if ($result = $objConexion->consultar($query)) {
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION['school_period'] = $row;
            }
        }
        
        $tipoUsuario = $_SESSION['usuarioautenticado']['FK_Tipo_User'];
        $_SESSION['permisos'] = $tipoUsuario == 1? 1 : 2;

        if ($recordarme) {
            setcookie("usuario", $usuario, time() + (60 * 5), "/", "");
            setcookie("contrasena", $contrasena, time() + (60 * 5), "/", "");
        }
        header("Location: /home.php");
        exit;
    } else {
        header("Location: /index.php?error=1");
    }
} catch (Exception $e) {
    header("Location: ../template/form_conexion.php");
    echo "Error en la conexión: " . $e->getMessage();
}
