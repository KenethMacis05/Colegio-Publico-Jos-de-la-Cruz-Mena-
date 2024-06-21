<?php 
require_once '../models/conexion.model.php';

class Tutor {

    private $objetoConexion;

    public function __construct() {
        $this->objetoConexion = new Conexion();
    }

    //Crear
    public function create($pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $cedula, $telefono, $direccion, $correo)
    {
        try {
            $query = "CALL sp_create_tutor(?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ssssssss', $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $cedula, $telefono, $direccion, $correo);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la consulta: " . $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
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

    public function readTutor($ID) {
        try {
            $consulta = "CALL sp_read_tutor_id('$ID');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        } 
    }

    //Actualizar
    public function update($id_tutor, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $cedula, $telefono, $direccion, $correo)
    {
        try {
            $query = "CALL sp_update_tutor(?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('sssssssss', $id_tutor, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $cedula, $telefono, $direccion, $correo);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la cansulta: " . $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }

    //Eliminar
    public function delete($ID)
    {
        try {
            $query = "CALL sp_delete_tutor(?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('s', $ID);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
}
?>