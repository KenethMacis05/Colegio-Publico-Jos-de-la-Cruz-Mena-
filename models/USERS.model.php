<?php 
class User {
    private $idUser;
    private $usuario;
    private $contrasena;
    private $fkTipoUser;
    private $priNombre;
    private $segNombre;
    private $priApellido;
    private $segApellido;
    private $telefono;
    private $correoElectronico;

    public function __construct($idUser = null, $usuario = null, $contrasena = null, $fkTipoUser = null, $priNombre = null, $segNombre = null, $priApellido = null, $segApellido = null, $telefono = null, $correoElectronico = null) {
        if (func_num_args() > 0) {
            $this->idUser = $idUser;
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;
            $this->fkTipoUser = $fkTipoUser;
            $this->priNombre = $priNombre;
            $this->segNombre = $segNombre;
            $this->priApellido = $priApellido;
            $this->segApellido = $segApellido;
            $this->telefono = $telefono;
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