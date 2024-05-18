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
    private $correo_electronico;

    private $objetoConexion;
    
    public function __construct($id_user = null, $fk_tipo_user = null, $usuario = null, $contrasena = null, $pri_nombre = null, $seg_nombre = null, $pri_apellido = null, $seg_apellido = null, $telefono = null, $correo_electronico = null){
        $this->id_user = $id_user;
        $this->fk_tipo_user = $fk_tipo_user;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->pri_nombre = $pri_nombre;
        $this->seg_nombre = $seg_nombre;
        $this->pri_apellido = $pri_apellido;
        $this->seg_apellido = $seg_apellido;
        $this->telefono = $telefono;
        $this->correo_electronico = $correo_electronico;

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
    public static function create($data) {
        global $conn; // Asume que $conn es una instancia de Conexion disponible globalmente
        $stmt = $conn->prepare("INSERT INTO users (FK_Tipo_User, Usuario, Contrasena, Pri_Nombre, Seg_Nombre, Pri_Apellido, Seg_Apellido, Telefono, Correo_Electronico) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssssi", $data['fk_tipo_user'], $data['usuario'], $data['contrasena'], $data['pri_nombre'], $data['seg_nombre'], $data['pri_apellido'], $data['seg_apellido'], $data['telefono'], $data['correo_electronico']);
        $stmt->execute();
        $stmt->close();
    }

    //Leer
    public function read() {
        $query = "SELECT U.Usuario, U.Pri_Nombre, U.Seg_Nombre, U.Pri_Apellido, U.Seg_Apellido, T.Tipo AS Permisos, U.Telefono, U.Correo_Electronico FROM USERS U JOIN Tipos_Users T ON U.FK_Tipo_User = T.ID_Tipo";
        $resultado =  $this->conexion->consultar($query);
        return $resultado;
    }

    //Actualizar
    public static function update($data) {
        global $conn;
        $stmt = $conn->prepare("UPDATE users SET FK_Tipo_User =?, Usuario =?, Contrasena =?, Pri_Nombre =?, Seg_Nombre =?, Pri_Apellido =?, Seg_Apellido =?, Telefono =?, Correo_Electronico =? WHERE ID_USER =?");
        $stmt->bind_param("issssssisi", $data['fk_tipo_user'], $data['usuario'], $data['contrasena'], $data['pri_nombre'], $data['seg_nombre'], $data['pri_apellido'], $data['seg_apellido'], $data['telefono'], $data['correo_electronico'], $data['id_user']);
        $stmt->execute();
        $stmt->close();
    }

    //Eliminar
    public static function delete($id_user) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM users WHERE ID_USER =?");
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $stmt->close();
    }
}
?>