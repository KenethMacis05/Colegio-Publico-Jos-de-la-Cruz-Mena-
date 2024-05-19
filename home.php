<?php 
    include_once "template/zona_priv.php";
?>

<!DOCTYPE html>
<html lang="es-NI">
<head>
    <!--Meta datos-->
    <?php include_once "template/metadata.php"?>
    <!--Estilos css-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.saludo.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.font.css">
    <link rel="stylesheet" href="/css/style.matricula.css">
    <!--Titulo de la pagina-->
    <title>Home</title>
    <style>
        .Contenedor-Saludo {
            width: auto !important;
            margin: 0 3% 0 0;
            position: absolute;
            top: 120px;
            left: 320px;
            padding: 2rem 1rem;
        }
        .fondo{
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .nav-pills .nav-link:hover {
            color: #215a94 !important;
        }
    </style>
</head>
<body class="fondo" style="background-image: url(src/img/bg-school.png);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "template/dashboard.php"?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">
                <?php include_once "template/section-info-title/section-info-title.php"?>
            </div>
            <!-----------------------Bienvenida----------------------->
            <div class="Contenedor-Saludo container text-white">
                <h2>Sistema de Matriculas</h2>
                <h1 class="sombra-text">JOSÉ DE LA CRUZ MENA</h1>
                <h3>Bienvenido, <?php echo $_SESSION['usuarioautenticado']['Pri_Nombre']. ' '. $_SESSION['usuarioautenticado']['Pri_Apellido'];?></h3>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        
</html>