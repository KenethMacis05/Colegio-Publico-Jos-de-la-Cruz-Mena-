<?php 
class Calificacion {
    private $idCalificaciones;
    private $fkEstudiante;
    private $fkAsignatura;
    private $puntaje;
    private $fkAnioLectivo;

    public function __construct($idCalificaciones = null, $fkEstudiante = null, $fkAsignatura = null, $puntaje = null, $fkAnioLectivo = null) {
        if (func_num_args() > 0) { 
            $this->idCalificaciones = $idCalificaciones;
            $this->fkEstudiante = $fkEstudiante;
            $this->fkAsignatura = $fkAsignatura;
            $this->puntaje = $puntaje;
            $this->fkAnioLectivo = $fkAnioLectivo;
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