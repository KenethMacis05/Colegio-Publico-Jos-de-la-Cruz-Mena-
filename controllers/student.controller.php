<?php 
include_once "../models/conexion.model.php";
include_once "../models/estudiante.model.php";

$objEstudiante = new Estudiante();

//Crear
if(isset($_POST['priNombre'])
    && isset($_POST['segNombre'])
    && isset($_POST['priApellido'])
    && isset($_POST['segApellido'])
    && isset($_POST['cedula'])
    && isset($_POST['fechaNacimiento'])
    && isset($_POST['genero'])
    && isset($_POST['telefono'])
    && isset($_POST['direccion'])
    && isset($_POST['correo'])
    && isset($_POST['fkTutor'])) {
        $priNombre = filter_var($_POST['priNombre'], FILTER_SANITIZE_STRIPPED);
        $segNombre = filter_var($_POST['segNombre'], FILTER_SANITIZE_STRIPPED);
        $priApellido = filter_var($_POST['priApellido'], FILTER_SANITIZE_STRIPPED);
        $segApellido = filter_var($_POST['segApellido'], FILTER_SANITIZE_STRIPPED);
        $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRIPPED);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $_POST['fechaNacimiento'])->format('Y-m-d');
        $cedula = filter_var($_POST['cedula'], FILTER_SANITIZE_STRING);
        $genero = filter_var($_POST['genero'], FILTER_SANITIZE_NUMBER_INT);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $fkTutor = filter_var($_POST['fkTutor'], FILTER_SANITIZE_NUMBER_INT);


        if ($objEstudiante->create($priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor)) {
            header("Location:../views/student.view.php?create=1");
            echo "<script>console.log('El estudiante se creo correctamente')</script>";
        } else {
            header("Location:../views/student.view.php?create=0");
            echo "<script>console.log('Error al crear el estudiante')</script>";
        }
        

}

//Actualizar
if (isset($_POST['modificaStudent'])
    && isset($_POST['edit_priNombre'])
    && isset($_POST['edit_segNombre'])
    && isset($_POST['edit_priApellido'])
    && isset($_POST['edit_segApellido'])
    && isset($_POST['edit_cedula'])
    && isset($_POST['edit_fechaNacimiento'])
    && isset($_POST['edit_genero'])
    && isset($_POST['edit_telefono'])
    && isset($_POST['edit_direccion'])
    && isset($_POST['edit_correo'])
    && isset($_POST['edit_fkTutor'])) {
        $ID = $_POST['modificaStudent'];
        $priNombre = $_POST['edit_priNombre'];
        $segNombre = $_POST['edit_segNombre'];
        $priApellido = $_POST['edit_priApellido'];
        $segApellido = $_POST['edit_segApellido'];
        $cedula = $_POST['edit_cedula'];
        $fechaNacimiento = $_POST['edit_fechaNacimiento'];
        $genero = $_POST['edit_genero'];
        $telefono = $_POST['edit_telefono'];
        $direccion = $_POST['edit_direccion'];
        $correo = $_POST['edit_correo'];
        $fkTutor = $_POST['edit_fkTutor'];

        if ($objEstudiante->update($ID, $priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor)) {
            header("Location:../views/student.view.php?update=1");
        } else {
            header("Location:../views/student.view.php?update=0");
        }
}

//Eliminar
if (isset($_GET['delete'])) {
    $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    
    if ($objEstudiante->delete($ID)) {
        header("Location:../views/student.view.php?delete=1");
    } else {
        header("Location:../views/student.view.php?delete=0");
    }
}
?>