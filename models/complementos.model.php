<?php
require_once '../models/conexion.model.php';

class Complemento
{

    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }

    //Leer Grados
    public function readGrados()
    {
        try {
            $consulta = "SELECT * FROM Grados";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Leer Secciones
    public function readSecciones()
    {
        try {
            $consulta = "SELECT * FROM Secciones";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Leer Periodo Escolar
    public function readPeriodoEscolar()
    {
        try {
            $consulta = "SELECT * FROM Anio_Lectivo";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Leer Turnos
    public function readTurnos()
    {
        try {
            $consulta = "SELECT * FROM Turnos";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Leer Estados
    public function readEstados()
    {
        try {
            $consulta = "SELECT * FROM Estados";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Leer Estudiantes
    public function readEstudiantes()
    {
        try {
            $consulta = "SELECT ID_Estudiante, CONCAT(Pri_Nombre, ' ', Seg_Apellido) AS Estudiante FROM Estudiantes";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }
}
