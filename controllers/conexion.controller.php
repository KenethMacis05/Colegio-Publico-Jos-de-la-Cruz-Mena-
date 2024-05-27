<?php
session_start();
require_once "../models/conexion.model.php";
// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los valores del formulario
    $server = $_POST['server'];
    $user = $_POST['user'];
    $database = $_POST['database'];
    $password = $_POST['password'];

    // Actualiza la configuración de conexión

    $conexion = new Conexion();
    $conexion->server = $server; // Corrección aquí
    $conexion->user = $user; // Corrección aquí
    $conexion->bd = $database; // Corrección aquí
    $conexion->pwd = $password; // Corrección aquí

    // Guarda la configuración de alguna manera, por ejemplo, en una sesión o en un archivo
    // Aquí solo se muestra cómo guardar en una variable de sesión para ilustrar el concepto
    $_SESSION['conexion_configurada'] = true;

    // Redirige al usuario a la página principal o a donde desees
    header("Location: /index.php");
    exit;
}
?>
