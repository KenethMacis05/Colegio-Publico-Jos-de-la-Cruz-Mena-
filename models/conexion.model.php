<?php

class Conexion{

    private $server;
    private $user;
    private $pwd;
    private $bd;
    private $mysqli;

    function __construct(){
        $this->server = 'localhost';
        $this->user = 'root';
        $this->bd = 'gestion_escolar_jdlcm';
        $this->pwd = '';
    }

    public function conectar(){

        $this->mysqli = new mysqli($this->server,$this->user,$this->pwd,$this->bd);

        if($this->mysqli->connect_errno){
            echo "No se pudo conectar con la base de datos: ".$this->mysqli->connect_error;
            return 0;
        }else{
            return $this->mysqli;
        }
    }

    public function cerrarConexion(){
        $this->mysqli->close();
    }

    public function consultar($query){
        $result = mysqli_query($this->conectar(), $query);
        //$result = $this->prepareE($query);
        if (!$result) {
            throw new Exception("Error al ejecutar la consulta: ". mysqli_error($this->conectar()));
        }
        $this->cerrarConexion();
        return $result;
    }    

    public function prepareE($query) {
        $stmt = $this->conectar()->prepare($query);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: ". $this->mysqli->error);
        }
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: ". $stmt->error);
        }
        return $stmt;
    }
}