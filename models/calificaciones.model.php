<?php 
require_once '../models/conexion.model.php';

class Calificacion {

    private $objetoConexion;

    public function __construct() {
        $this->objetoConexion = new Conexion();
    }

    //Crear
    public function create($estudiante, $Matematica, $Lengua_Extranjera, $Lengua_Literatura , $Ciencias_Naturales , $Educacion_Fisica , $Quimica , $OTV , $Fisica , $Biologia , $Historia , $Geografia , $Economia , $Sociologia , $ECA , $Anio, $Grado)
    {
        try {
            $query = "CALL sp_create_calificaciones(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('sssssssssssssssss', $estudiante, $Matematica, $Lengua_Extranjera, $Lengua_Literatura , $Ciencias_Naturales , $Educacion_Fisica , $Quimica , $OTV , $Fisica , $Biologia , $Historia , $Geografia , $Economia , $Sociologia , $ECA , $Anio, $Grado);
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
    //leer
    public function read() {
        try {
            $consulta = "CALL sp_read_calificaciones();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        } 
    }

    //Contar la cantidad de Matrículas por año
    public function readCantidadCalificacionesAnio()
    {
        try {
            $consulta = "CALL sp_read_calificaciones_anio();";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    // Leer por ID
    public function readID($ID) {
        try {
            $consulta = "CALL sp_read_calificaciones_id('$ID');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: ". $e->getMessage();
            return false;
        } 
    }

    //Leer por Grado y Año
    public function readGradoAnio($grado, $anio)
    {
        try {
            $consulta = "CALL sp_read_calificaciones_grado_anio('$grado', '$anio');";
            return $this->objetoConexion->consultar($consulta);
        } catch (Exception $e) {
            echo "Error en la cansulta: " . $e->getMessage();
            return false;
        } 
    }

    //Actualizar
    public function update($id, $estudiante, $Matematica, $Lengua_Extranjera, $Lengua_Literatura , $Ciencias_Naturales , $Educacion_Fisica , $Quimica , $OTV , $Fisica , $Biologia , $Historia , $Geografia , $Economia , $Sociologia , $ECA , $Anio, $Grado)
    {
        try {
            $query = "CALL sp_update_calificaciones(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('ssssssssssssssssss', $id, $estudiante, $Matematica, $Lengua_Extranjera, $Lengua_Literatura , $Ciencias_Naturales , $Educacion_Fisica , $Quimica , $OTV , $Fisica , $Biologia , $Historia , $Geografia , $Economia , $Sociologia , $ECA , $Anio, $Grado);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error en la cansulta: " . $e->getMessage());
            return false;
        } finally {
            
            $this->objetoConexion->cerrarConexion();
        }
    }

    //Eliminar
    public function delete($ID)
    {
        try {
            $query = "CALL sp_delete_calificaciones(?);";
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

    //Promedio de calificaciones
    public function promedio($FK_Estudiante)
    {
        try {
            $query = "select function_promedio_calificaciones(?);";
            $stmt = $this->objetoConexion->prepare($query);
            $stmt->bind_param('s', $FK_Estudiante);
            if ($stmt->execute()) {
                $stmt->bind_result($promedio);
                $stmt->fetch();
                $stmt->close();
                return $promedio;
            } else {
                throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
            }             
        } catch (Exception $e) {
            echo "Error en la consulta: ". $e->getMessage();
            return null;
        } finally {            
            $this->objetoConexion->cerrarConexion();
        }
    }

}

?>