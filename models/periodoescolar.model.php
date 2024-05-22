<?php
require_once '../models/conexion.model.php';

class PeriodoEscolar
{
    private $anio;
    private $fecha_inicial;
    private $fecha_final;
    private $estado;
    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }

    //Metodos CRUD
    
    public function create($anio, $fecha_inicial, $fecha_final, $estado)
    {
        try {
            $consulta = "INSERT INTO anio_lectivo (Anio, Fecha_Inicio, Fecha_final, Estado) VALUES 
            ('$anio', '$fecha_inicial', '$fecha_final', '$estado');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
    }

    //Leer
    public function read()
    {
        $consulta = "SELECT * FROM anio_lectivo;";
        return $this->objetoConexion->consultar($consulta);
    }

    //Actualizar
    public function update($id, $anio, $fecha_inicial, $fecha_final, $estado)
    {
        $consulta = "UPDATE anio_lectivo SET Anio = '$anio', Fecha_Inicio = '$fecha_inicial', Fecha_final = '$fecha_final', Estado = '$estado' WHERE ID_Anio_Lectivo = $id";
        return $this->objetoConexion->consultar($consulta);
    }


    //Eliminar
    public function delete($id)
    {
        $consulta = "DELETE FROM anio_lectivo WHERE ID_Anio_Lectivo = $id";
        return $this->objetoConexion->consultar($consulta);
    }
}
