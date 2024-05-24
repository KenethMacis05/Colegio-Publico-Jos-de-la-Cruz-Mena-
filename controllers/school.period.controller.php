<?php 
require_once "../models/conexion.model.php";
require_once "../models/periodoescolar.model.php";

$periodoEscolar = new PeriodoEscolar();

try {
    #Crear un nuevo periodo escolar
    if (isset($_POST['estado']) && isset($_POST['anio']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_final'])) {
        $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING); 
        $anio = filter_input(INPUT_POST, 'anio', FILTER_SANITIZE_NUMBER_INT);
        $fecha_inicio = filter_input(INPUT_POST, 'fecha_inicio', FILTER_SANITIZE_STRING);
        $fecha_final = filter_input(INPUT_POST, 'fecha_final', FILTER_SANITIZE_STRING);
        
        if ($periodoEscolar->create($anio, $fecha_inicio, $fecha_final, $estado)) {
            header("Location:../views/school_period.view.php?crear=1");
        } else {
            header("Location:../views/school_period.view.php?crear=2");
        }
    }    
    
    #Editar un periodo escolar
    if (isset($_GET['update_period'])) {
        $id_period = filter_input(INPUT_GET, 'update_period', FILTER_SANITIZE_NUMBER_INT);
        $anio = $_POST['anio'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];
        $estado = $_POST['estado'];

        if ($periodoEscolar->update($id_period, $anio, $fecha_inicio, $fecha_final, $estado)) {
            header("Location:../views/school_period.view.php?update=1");
        } else {
            header("Location:../views/school_period.view.php?update=0");
        }
    }

    #Eliminar un nuevo periodo escolar
    if (isset($_GET['delete_period'])) {
        $id_school_period = filter_input(INPUT_GET, 'delete_period', FILTER_SANITIZE_NUMBER_INT);

        if ($periodoEscolar->delete($id_school_period)) {
            header("Location:../views/school_period.view.php?eliminar=1");
        } else {
            header("Location:../views/school_period.view.php?eliminar=0");
        }
    }
} catch (Exception $e) {
    // Manejo de errores, por ejemplo, registrando la excepción
    error_log($e->getMessage());
    die("Ocurrió un error inesperado.");
}
?>
