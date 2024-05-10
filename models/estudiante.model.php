<?php 
class Estudiante {
    private $idEstudiante;
    private $priNombre;
    private $segNombre;
    private $priApellido;
    private $segApellido;
    private $fechaNacimiento;
    private $cedula;
    private $genero;
    private $telefono;
    private $direccion;
    private $correoElectronico;
    private $fkTutor;

    public function __construct($idEstudiante, $priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correoElectronico, $fkTutor) {
        $this->idEstudiante = $idEstudiante;
        $this->priNombre = $priNombre;
        $this->segNombre = $segNombre;
        $this->priApellido = $priApellido;
        $this->segApellido = $segApellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->cedula = $cedula;
        $this->genero = $genero;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->correoElectronico = $correoElectronico;
        $this->fkTutor = $fkTutor;
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