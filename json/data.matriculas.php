<?php 
include_once '../models/matricula.model.php';

$objMatricula = new Matricula;
$allMatriculas = $objMatricula->readCantidadMatriculasAnio();
$datos = [];
foreach ($allMatriculas as $fila) {
    $datos['labels'][] = $fila['Anio'];
    $datos['datasets'][0]['data'][] = $fila['Cantidad'];
}
header('Content-Type: application/json');
echo json_encode($datos);