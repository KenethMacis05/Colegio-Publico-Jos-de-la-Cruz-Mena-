<?php 
include_once "../models/conexion.model.php";
include_once "../models/periodoescolar.model.php";

$periodoEscolar = new PeriodoEscolar();

if(isset($_POST['estado']) && isset($_POST['anio']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])){
    $estado = $_POST['estado']; 
    $anio = $_POST['anio'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];
    
    if ($periodoEscolar->create($anio, $fecha_inicio, $fecha_final, $estado)) {
        header("Location: ../views/school_period.view.php?crear=1");
    } else {
        header("Location: ../views/school_period.view.php?crear=2");
    }
}

if(isset($_GET['delete_period'])){

    $id_school_period = $_GET['delete_period'];

    if($periodoEscolar->delete($id_school_period)){
        header("Location: ../views/school_period.view.php?eliminar=1");
    }else{
        header("Location: ../views/school_period.view.php?eliminar=0");
    }
}
?>
