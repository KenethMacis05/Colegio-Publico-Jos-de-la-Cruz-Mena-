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
// Verifica si todos los campos necesarios están presentes en el POST
$requiredFields = [
    'modificaStudent',
    'edit_priNombre',
    'edit_segNombre',
    'edit_priApellido',
    'edit_segApellido',
    'edit_cedula',
    'edit_fechaNacimiento',
    'edit_genero',
    'edit_telefono',
    'edit_direccion',
    'edit_correo',
    'edit_fkTutor'
];

if (!empty(array_intersect($requiredFields, array_keys($_POST)))) {
    $ID = filter_input(INPUT_POST, 'modificaStudent', FILTER_SANITIZE_NUMBER_INT);
    $nombreCampos = [
        'priNombre' => 'edit_priNombre', 
        'segNombre' => 'edit_segNombre', 
        'priApellido' => 'edit_priApellido', 
        'segApellido' => 'edit_segApellido', 
        'cedula' => 'edit_cedula', 
        'fechaNacimiento' => 'edit_fechaNacimiento', 
        'genero' => 'edit_genero', 
        'telefono' => 'edit_telefono', 
        'direccion' => 'edit_direccion', 
        'correo' => 'edit_correo', 
        'fkTutor' => 'edit_fkTutor'];

    foreach ($nombreCampos as $key => $campo) {
        $$key = filter_input(INPUT_POST, $campo, FILTER_SANITIZE_STRING);
    }

    if ($objEstudiante->update($ID, $priNombre, $segNombre, $priApellido, $segApellido, $fechaNacimiento, $cedula, $genero, $telefono, $direccion, $correo, $fkTutor)) {
        header("Location:../views/student.view.php?update=1");
    } else {
        header("Location:../views/student.view.php?update=0");
    }
} 

//Eliminar
if (isset($_GET['delete'])) {
    try {
        $ID = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $objEstudiante->delete($ID)? "../views/student.view.php?delete=1" : "../views/student.view.php?delete=0";
        header("Location: ". $resultado);
        exit;
    } catch (Exception $e) {
        error_log("Error al eliminar el estudiante: ". $e->getMessage());
        exit;
    }
    
}
?>