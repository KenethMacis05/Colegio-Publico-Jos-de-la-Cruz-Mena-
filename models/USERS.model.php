<?php

require_once '../models/conexion.model.php';

class Users
{
    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }

    //Login
    public function login($usuario, $contrasena)
    {
        try {
            $query = "CALL sp_login_user(?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ss', $usuario, $contrasena);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                return $result;
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

    //Crear
    public function create($tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen)
    {
        try {
            $query = "CALL sp_create_user(?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ssssssssss', $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen);
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

    //Leer
    public function read()
    {
        try {
            $consulta = "CALL sp_read_user();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Actualizar
    public function update($id_user, $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen)
    {
        try {
            $query = "CALL sp_update_user(?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('sssssssssss', $id_user, $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen);
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
    
    public function update2($id_user, $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo)
    {
        try {
            $query = "CALL sp_update_user2(?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ssssssssss', $id_user, $tipo, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo);
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
            $query = "CALL sp_delete_user(?);";
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
