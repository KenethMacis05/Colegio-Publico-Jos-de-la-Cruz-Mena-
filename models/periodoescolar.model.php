<?php 
class User {
    private $anio;
    private $fecha_inicial;
    private $fecha_final;

    public function __construct($anio = null, $fecha_inicial = null, $fecha_final = null) {
        if (func_num_args() > 0) {
            $this->anio = $anio;
            $this->fecha_inicial = $fecha_inicial;
            $this->fecha_final = $fecha_final;
        }
    }
    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }
}
?>