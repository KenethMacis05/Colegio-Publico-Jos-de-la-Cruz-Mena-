<?php 
class Tutor {
    private $idTutor;
    private $priNombre;
    private $segNombre;
    private $priApellido;
    private $segApellido;
    private $cedula;
    private $telefono;
    private $direccion;
    private $fkParentescoEstudiante;
    private $correoElectronico;

    public function __construct($idTutor = null, $priNombre = null, $segNombre = null, $priApellido = null, $segApellido = null, $cedula = null, $telefono = null, $direccion = null, $fkParentescoEstudiante = null, $correoElectronico = null) {
        if (func_num_args() > 0) { 
            $this->idTutor = $idTutor;
            $this->priNombre = $priNombre;
            $this->segNombre = $segNombre;
            $this->priApellido = $priApellido;
            $this->segApellido = $segApellido;
            $this->cedula = $cedula;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->fkParentescoEstudiante = $fkParentescoEstudiante;
            $this->correoElectronico = $correoElectronico;
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