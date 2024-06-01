<?php
require_once '../models/conexion.model.php';

class PeriodoEscolar
{
    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }
    
    //Crear
    public function create($anio, $fecha_inicial, $fecha_final, $estado) {
        try {
            $query = "CALL sp_create_school_period(?,?,?,?)";
            $stmt = $this->objetoConexion->prepare($query);            
            $stmt->bind_param('ssss', $anio, $fecha_inicial, $fecha_final, $estado);
            if ($stmt->execute()) {
                return true;                
            } else {
                throw new Exception("Error al ejecutar la consulta: ". $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la consulta: ". $e->getMessage()) ;
            return false;
        } finally {            
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
    //Leer
    public function read() { 
        try {
            $consulta = "CALL sp_read_school_period();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }
    //Actualizar
    public function update($id, $anio, $fecha_inicial, $fecha_final, $estado) {
        try {
            $query = "CALL sp_update_school_period(?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('sssss', $id, $anio, $fecha_inicial, $fecha_final, $estado);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: ". $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la cansulta: ". $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
    //Eliminar
    public function delete($ID) {
        try {
            $query = "CALL sp_delete_school_period(?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('s', $ID);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: ". $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
}
