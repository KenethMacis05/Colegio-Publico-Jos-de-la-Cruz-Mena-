<?php 
include_once '../models/calificaciones.model.php';

$objCalificacion = new Calificacion;
$allCalificaciones = $objCalificacion->readCantidadCalificacionesAnio();
$datos = [];
foreach ($allCalificaciones as $fila) {
    $datos['labels'][] = $fila['Anio'];
    $datos['datasets'][0]['data'][] = $fila['Cantidad'];
}
header('Content-Type: application/json');
echo json_encode($datos);