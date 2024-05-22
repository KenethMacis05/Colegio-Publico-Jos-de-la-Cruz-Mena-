<?php 
include_once "../models/conexion.model.php";
include_once "../models/USERS.model.php";

#Datos de usuario
$usuario = $_POST['usuario'];
$rol = $_POST['tipo_usuario'];
$pri_nombre = $_POST['pri_nombre'];
$seg_nombre = $_POST['seg_nombre'];
$pri_apellido = $_POST['pri_apellido'];
$seg_apellido = $_POST['seg_apellido'];
$telefono = $_POST['$telefono'];
$correo = $_POST['$Correo'];
?>