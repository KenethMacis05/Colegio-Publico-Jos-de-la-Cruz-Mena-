<?php 

require_once '../models/conexion.model.php'; 

class Matricula {
    private $idMatricula;
    private $codMatricula;
    private $fkEstudiante;
    private $fkGrupo;
    private $fkModalidad;
    private $fkAnioLectivo;
    private $fechaMatricula;
    private $fkEstado;
    private $objetoConexion;

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
        $this->objetoConexion = new Conexion();
    }

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
        return $this;
    }
    #Metodos CRUD
    # Leer
    public function read(){
        $consulta = "
        SELECT 
            M.ID_Matricula, 
            M.Cod_Matricula, 
            E.Pri_Nombre, 
            E.Seg_Nombre, 
            E.Pri_Apellido, 
            E.Seg_Apellido, 
            E.Telefono, 
            CONCAT(Gr.Grado, ' ', Sec.Seccion) AS Grupo, 
            T.Turno, 
            Est.Estado, 
            E.Direccion, 
            A.Anio, 
            M.Fecha_Matricula,
            Tut.Pri_Nombre AS T_Pri_Nombre, 
            Tut.Seg_Nombre AS T_Seg_Nombre, 
            Tut.Pri_Apellido AS T_Pri_Apellido, 
            Tut.Seg_Apellido AS T_Seg_Apellido
        FROM 
            Matriculas M
        INNER JOIN 
            Estudiantes E ON M.FK_Estudiante = E.ID_Estudiante
        INNER JOIN 
            Turnos T ON M.FK_Turno = T.ID_Turno
        INNER JOIN 
            Estados Est ON M.FK_Estado = Est.ID_Estado
        INNER JOIN 
            Anio_Lectivo A ON M.FK_Anio_Lectivo = A.ID_Anio_Lectivo
        INNER JOIN 
            Grupos G ON M.FK_Grupo = G.ID_Grupo
        INNER JOIN 
            Grados Gr ON G.FK_Grado = Gr.ID_Grado -- Corrección aquí
        INNER JOIN 
            Secciones Sec ON G.FK_Seccion = Sec.ID_Seccion
        INNER JOIN 
            Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor;
        ";
        return $this->objetoConexion->consultar($consulta);
    }
}
?>