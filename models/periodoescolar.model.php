<?php 
require_once '../models/conexion.model.php'; 

class PeriodoEscolar {
    private $anio;
    private $fecha_inicial;
    private $fecha_final;
    private $objetoConexion;

    public function __construct($anio = null, $fecha_inicial = null, $fecha_final = null) {
        if (func_num_args() > 0) {
            $this->anio = $anio;
            $this->fecha_inicial = $fecha_inicial;
            $this->fecha_final = $fecha_final;
        }
        $this->objetoConexion = new Conexion();
    }
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }

    //Metodos CRUD
    public function read(){
        $consulta = "SELECT * FROM anio_lectivo;";
        return $this->objetoConexion->consultar($consulta);
    }
}
?>