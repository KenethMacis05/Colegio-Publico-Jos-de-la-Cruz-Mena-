<?php 
    include_once "../template/zona_priv.php";
?>

<!DOCTYPE html>
<html lang="es-NI">
<head>
    <!--Meta datos-->
    <?php include_once "../template/metadata.php"?>
    <!--Estilos css-->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/styles.form.css">
    <!--Titulo de la pagina-->
    <title>Nueva Matrícula | Sistema Escolar</title>
    <link rel="icon" href="/src/img/icon.webp" type="png/img">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .nav-pills .nav-link:hover {
            color: #215a94 !important;
        }
        hr {
            color: white;
            width: 100%;
        }
        .Contenedor-List {
            background-color: #212529;
            box-shadow: -5px 5px 5px rgba(73, 80, 104, 0.4) !important;
            width: 70vw;
            margin: 0 3% 0 0;
            position: absolute;
            top: 120px;
            left: 320px;
            padding: 2rem 1rem;
            border-radius: 25px;
            
        }
        form {
            background-color: #FFFFFF;
            border-radius: 15px;
            padding: 1rem 0;
        }
        .titulo, .titulo-notas {
            text-align: center;
        }

        .inputs-group {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;            
        }

        .cajas-texto {
            margin: auto;
            display: flex;
            align-items: center;
            position: relative;
            padding: 5px 5px;
            border: none;
        }
        .cajas-texto input, .cajas-texto select, .cajas-texto textarea, .cajas-texto option {
            width: 15.625em;
            padding: 0.625em 0.625em 0.625em 3.125em;
            font-size: 1em;
            border-radius: 10px;
            background-color: #FFFFFF;
            outline: none;
            border-color: #E5E5E5;
        }

        .cajas-texto input:focus, .cajas-texto select:focus, .cajas-texto textarea:focus {
            background-color: #F4F4F4;
        }

        option {
            background: #c8c8c938;
        }

        option:hover {
            background-color: #387a3b;
        }

        .icon {
            color: #9c9494;
            font-size: 20px;
            position: absolute;
            left: 20px;
        }

        .icon-container {
            position: absolute;
            top: -5px;
            right: -5px;
        }
        .icon-container-i {
            position: absolute;
            top: -5px;
            left: -5px;
        }
    </style>
</head>
<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include_once "../template/dashboard.php"?>
            <div class="col py-3 header">
                <?php #include_once "/template/section-info-title/section-info-title.php"?>
            </div>            
        </div>
        <?php include_once "../template/form/form_new_registration.php"?>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="/js/form_controller.js"></script>
    <script src="/js/alert.js"></script>
</html>