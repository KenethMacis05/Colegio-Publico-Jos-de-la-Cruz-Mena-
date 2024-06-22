<?php
include_once "template/zona_priv.php";
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!--Meta datos-->
    <?php include_once "template/metadata.php" ?>
    <!--Estilos css-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.saludo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.font.css">
    <link rel="stylesheet" href="/css/style.matricula.css">
    <!--Titulo de la pagina-->
    <title>Sistema de Matrículas JDLCM</title>
</head>

<body class="fondo" style="background-image: url(src/img/bg-school-desenfoque.jpg);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "template/dashboard.permisos.php"; ?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">
                <?php include_once "template/section-info-title.php" ?>
            </div>
            <!-----------------------Bienvenida----------------------->
            <div class="Contenedor-Saludo container text-white d-flex justify-content-between">
                <div>
                    <h2>Sistema de Matriculas</h2>
                    <h1 class="sombra-text">JOSÉ DE LA CRUZ MENA</h1>
                    <h3>Bienvenido, <?php echo $_SESSION['usuarioautenticado']['Pri_Nombre'] . ' ' . $_SESSION['usuarioautenticado']['Pri_Apellido']; ?></h3>
                </div>
                <div>
                    <button type="button" class="btn btn-dark" style="color: white" onclick="window.location.href='/src/Manual de usuarios del sistema de matriculas.pdf'">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                        Manual de Usuario
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>