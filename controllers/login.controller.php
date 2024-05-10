<?php

include_once "../models/conexion.model.php";

$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

$objConection = new Conexion();

$consulta = "SELECT * FROM users where usuario = '$usuario' 
and contrasena = '$contrasena';";

if($resultado = $objConection->consultar($consulta)){
    if(mysqli_num_rows($resultado)>0){
        header("Location: /home.php");
        exit;
    }else {
        echo "error en usuario y/o contraseña";
    }
}else {
    echo "Hubo un error"; 
}
