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

    public function consultar($query) {
        try {
            $this->mysqli = $this->conectar();
    
            if (!$this->mysqli) {
                throw new Exception("No se pudo conectar con la base de datos.");
            }

            $stmt = $this->mysqli->prepare($query);
            $stmt->execute();
    
            $result = $stmt->get_result();
            $stmt->close();
    
            return $result;
        } catch (Exception $e) {
            echo "Error al ejecutar la consulta: ". $e->getMessage();
            return null;
        }
    }
    
}