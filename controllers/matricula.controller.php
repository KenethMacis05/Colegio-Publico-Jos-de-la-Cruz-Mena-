<?php

include_once "../models/conexion.model.php";
include_once "../models/calificaiones.model.php";
include_once "../models/estudiante.model.php";
include_once "../models/matricula.model.php";
include_once "../models/tutor.model.php";

#Datos de estudiante
$PriNombreEstudiante = $_POST['PriNombreEstudiante'];
$SegNombreEstudiante = $_POST['SegNombreEstudiante'];
$PriApellidoEstudiante = $_POST['PriApellidoEstudiante'];
$SegApellidoEstudiante = $_POST['PriApellidoEstudiante'];
$FechaNacEstudiante = $_POST['FechaNacEstudiante'];
$CedulaEstudiante = $_POST['CedulaEstudiante'];
$FkGeneroEstudiante = $_POST['FkGeneroEstudiante'];
$TelefonoEstudiante = $_POST['TelefonoEstudiante'];
$DireccionEstudiante = $_POST['DirrecionEstudiante'];
$CorreoEstudiante = $_POST['CorreoEstudiante'];
$FkTutorEstudiante = $_POST['FkTutorEstudiante'];

#Datos de tutor
$PriNombreTutor = $_POST['PriNombreTutor'];
$SegNombreTutor = $_POST['SegNombreTutor'];
$PriApellidoTutor = $_POST['PriApellidoTutor'];
$SegApellidoTutor = $_POST['PriApellidoTutor'];
$CedulaTutor = $_POST['CedulaTutor'];
$TelefonoTutor = $_POST['TelefonoTutor'];
$DireccionTutor = $_POST['DirrecionTutor'];
$ParentescoTutor = $_POST['ParentescoTutor'];
$CorreoEstudiante = $_POST['CorreoEstudiante'];

#Datos de matricula
$CodMatricula = $_POST['CodMatricula'];
$FkEstudiante = $_POST['FkEstudiante'];
$FkGrupo = $_POST['FkGrupo'];
$FkEstado = $_POST['FkEstado'];
$FkAnioLectivo = $_POST['FkAnioLectivo'];
$FechaMatricula = $_POST['FechaMatricula'];

#Datos Calificaiones
$Matematica = $_POST['Matematica'];
$LenguaLiteratura = $_POST['LenguaLiteratura'];
$EducacionFisica = $_POST['EducacionFisica'];
$OrientacionTecnicaVocacional = $_POST['OrientacionTecnicaVocacional'];
$Biologia = $_POST['Biologia'];
$Geografia = $_POST['Geografia'];
$Sociologia = $_POST['Sociologia'];
$LenguaExtranjera = $_POST['LenguaExtranjera'];
$CienciasNaturales = $_POST['CienciasNaturales'];
$Quimica = $_POST['Quimica'];
$Fisica = $_POST['Fisica'];
$Historia = $_POST['Historia'];
$Economia = $_POST['$Economia'];
$ExpresionCulturalArtistica = $_POST['$ExpresionCulturalArtistica'];

?>



