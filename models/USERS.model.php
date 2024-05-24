<?php 

require_once '../models/conexion.model.php'; 

class Users
{    
    private $objetoConexion;
    
    public function __construct() {
        $this->objetoConexion = new Conexion();
    }

    //Funcion para logiarse 
    public function login($usuario, $contrasena){
        $consulta = "SELECT * FROM users where usuario = '$usuario' and contrasena = '$contrasena';";
        $resultado = $this->objetoConexion->consultar($consulta);
        return $resultado;
    }

    //Crear
    public function create($tipo ,$usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen) {
        try {
            $consulta = "CALL sp_create_user('$tipo', '$usuario', '$contrasena', '$pri_nombre', '$seg_nombre', '$pri_apellido', '$seg_apellido', '$telefono', '$correo', '$imagen');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }

    //Leer
    public function read(){
        try {
            $consulta = "CALL sp_read_user();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }

    //Actualizar
    public function update($id_user, $tipo ,$usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $imagen) {
        try {
            $consulta = "CALL sp_update_user('$id_user', '$tipo', '$usuario', '$contrasena', '$pri_nombre', '$seg_nombre', '$pri_apellido', '$seg_apellido', '$telefono', '$correo', '$imagen');";        
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
        
    }
    

    //Eliminar
    public function delete($id_user) {
        try {
            $consulta = "CALL sp_delete_user('$id_user');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
    }
    
}
?>