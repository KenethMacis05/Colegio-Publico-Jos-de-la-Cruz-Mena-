<?php
require_once '../models/conexion.model.php';

class Matricula
{

    private $objetoConexion;

    public function __construct()
    {
        $this->objetoConexion = new Conexion();
    }

    //Crear
    public function create($codMatricula, $fkEstudiante, $fkGrupo, $fkModalidad, $fkAnioLectivo, $fechaMatricula, $fkEstado)
    {
        try {
            $query = "CALL sp_create_matricula(?,?,?,?,?,?,?)";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('sssssss', $codMatricula, $fkEstudiante, $fkGrupo, $fkModalidad, $fkAnioLectivo, $fechaMatricula, $fkEstado);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la consulta: " . $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }

    //Leer
    public function read()
    {
        try {
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
                Grados Gr ON G.FK_Grado = Gr.ID_Grado
            INNER JOIN 
                Secciones Sec ON G.FK_Seccion = Sec.ID_Seccion
            INNER JOIN 
                Tutores Tut ON E.FK_Tutor = Tut.ID_Tutor;
            ";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        }
    }

    //Actualizar
    public function update($id, $codMatricula, $fkEstudiante, $fkGrupo, $fkModalidad, $fkAnioLectivo, $fechaMatricula, $fkEstado)
    {
        try {
            $query = "CALL sp_update_matricula(?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ssssssss', $id, $codMatricula, $fkEstudiante, $fkGrupo, $fkModalidad, $fkAnioLectivo, $fechaMatricula, $fkEstado);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la cansulta: " . $e->getMessage());
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
    
    //Eliminar
    public function delete($ID)
    {
        try {
            $query = "CALL sp_delete_matricula(?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('s', $ID);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } finally {
            $stmt->close();
            $this->objetoConexion->cerrarConexion();
        }
    }
}
