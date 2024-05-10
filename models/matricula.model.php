<?php 
class Matricula {
    private $idMatricula;
    private $codMatricula;
    private $fkEstudiante;
    private $fkGrupo;
    private $fkModalidad;
    private $fkAnioLectivo;
    private $fechaMatricula;
    private $fkEstado;

    public function __construct($idMatricula = null, $codMatricula = null, $fkEstudiante = null, $fkGrupo = null, $fkModalidad = null, $fkAnioLectivo = null, $fechaMatricula = null, $fkEstado = null) {
        if (func_num_args() > 0) {
            $this->idMatricula = $idMatricula;
            $this->codMatricula = $codMatricula;
            $this->fkEstudiante = $fkEstudiante;
            $this->fkGrupo = $fkGrupo;
            $this->fkModalidad = $fkModalidad;
            $this->fkAnioLectivo = $fkAnioLectivo;
            $this->fechaMatricula = $fechaMatricula;
            $this->fkEstado = $fkEstado;
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