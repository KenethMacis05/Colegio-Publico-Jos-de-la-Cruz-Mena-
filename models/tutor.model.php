<?php 
require_once '../models/conexion.model.php';

class Tutor {

    private $objetoConexion;

    public function __construct() {
        $this->objetoConexion = new Conexion();
    }

    //Crear
    public function create() {
        try {
            $consulta = "CALL sp_create_tutor();";
            $resultado = $this->objetoConexion->consultar($consulta);
            return $resultado;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    //leer
    public function read() {
        try {
            $consulta = "CALL sp_read_tutor();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        }
    }

    //Actualizar
    public function update() {
        try {
            $consulta = "CALL sp_update_tutor();";
            $resultado = $this->objetoConexion->consultar($consulta);
            return $resultado;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    //Eliminar
    public function delete() {
        try {
            $consulta = "CALL sp_delete_tutor();";
            $resultado = $this->objetoConexion->consultar($consulta);
            return $resultado;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
?>