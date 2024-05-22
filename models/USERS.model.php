<?php 

require_once '../models/conexion.model.php'; 

class Users{
    private $id_user;
    private $fk_tipo_user;
    private $usuario;
    private $contrasena;
    private $pri_nombre;
    private $seg_nombre;
    private $pri_apellido;
    private $seg_apellido;
    private $telefono;
    private $correo;

    private $objetoConexion;
    
    public function __construct($id_user = null, $fk_tipo_user = null, $usuario = null, $contrasena = null, $pri_nombre = null, $seg_nombre = null, $pri_apellido = null, $seg_apellido = null, $telefono = null, $correo = null){
        $this->id_user = $id_user;
        $this->fk_tipo_user = $fk_tipo_user;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->pri_nombre = $pri_nombre;
        $this->seg_nombre = $seg_nombre;
        $this->pri_apellido = $pri_apellido;
        $this->seg_apellido = $seg_apellido;
        $this->telefono = $telefono;
        $this->correo = $correo;

        $this->objetoConexion = new Conexion();
    }

    //Getter
    public function __get($propiedad) {
        return $this->$propiedad;
    }
    //Setter
    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }

    //Funcion para logiarse 
    public function login($usuario, $contrasena){
        $consulta = "SELECT * FROM users where usuario = '$usuario' and contrasena = '$contrasena';";
        $resultado = $this->objetoConexion->consultar($consulta);
        return $resultado;
    }

    //Metodos CRUD

    //Crear
    public function create($usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo) {
        $consulta = "INSERT INTO users (Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico) VALUES
        ('$usuario', '$contrasena', '$pri_nombre', '$seg_nombre', '$pri_apellido', '$seg_apellido', '$telefono', '$correo');";
        return $this->objetoConexion->consultar($consulta);
    }

    //Leer
    public function read(){
        $consulta = "SELECT U.ID_USER, U.Usuario, U.Pri_Nombre, U.Seg_Nombre, U.Pri_Apellido, U.Seg_Apellido, T.Tipo AS Permisos, U.Telefono, U.Correo_Electronico
        FROM USERS U
        JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo;";
        return $this->objetoConexion->consultar($consulta);
    }

    //Actualizar
    public function update($id_user, $usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo) {
        $consulta = "UPDATE users SET Usuario =?, Contrasena =?, Pri_Nombre =?, Seg_Nombre =?, Pri_Apellido =?, Seg_Apellido =?, Telefono =?, Correo_Electronico =? WHERE ID_USER =?";
        $parametros = array($usuario, $contrasena, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $telefono, $correo, $id_user);
        return $this->objetoConexion->consultar($consulta, $parametros);
    }
    

    //Eliminar
    public function delete($id_user) {
        $consulta = "DELETE FROM users WHERE ID_USER =?";
        $parametros = array($id_user);
        return $this->objetoConexion->consultar($consulta, $parametros);
    }
    
}
?>