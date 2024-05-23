<?php
require_once '../models/conexion.model.php';

class PeriodoEscolar
{
    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }

    public function create($anio, $fecha_inicial, $fecha_final, $estado) { //Crear
        try {
            $consulta = "CALL sp_new_school_period('$anio', '$fecha_inicial', '$fecha_final', '$estado');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
    }

    public function read() { //Leer
        try {
            $consulta = "CALL sp_school_period();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }

    public function update($id, $anio, $fecha_inicial, $fecha_final, $estado) { //Actualizar
        try {
            $consulta = "CALL sp_update_school_period('$id', '$anio', '$fecha_inicial', '$fecha_final', '$estado');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }

    public function delete($id) { //Eliminar
        try {
            $consulta = "CALL sp_delete_school_period('$id');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }
}
