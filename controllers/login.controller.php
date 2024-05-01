<?php

include_once "../models/conexion.model.php";

$usuario = $_POST['email'];
$contrasena = $_POST['password'];

$objConection = new Conexion();

$consulta = "SELECT * FROM users where email = '$usuario' 
and contrasena = '$contrasena';";

if($resultado = $objConection->consultar($consulta)){
    if(mysqli_num_rows($resultado)>0){
        echo "Usuario conectado";
    }else {
        echo "error en usuario y/o contraseña";
    }
}else {
    echo "Hubo un error"; 
}