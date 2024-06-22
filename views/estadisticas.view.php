<?php
require_once "../template/zona_priv.php";
include_once "../models/tutor.model.php";
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!-- Meta Data -->
    <?php include_once "../template/metadata.php" ?>
    <!-- Recursos Necesarios -->
    <?php include_once "../template/head.php" ?>
    <!-- Titulo de la pagina -->
    <title>Estadisticas | Sistema JDLCM</title>
    <style>
        .Contenedor-Estadisticas {
            width: 73vw !important;
            margin: 0 3% 0 0;
            position: absolute;
            top: 120px;
            left: 320px;
        }
        canvas {
            box-shadow: -5px 5px 5px rgba(73, 80, 104, 0.4) !important;
            border-radius: 25px;
        }
    </style>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "../template/dashboard.permisos.php" ?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">
                <?php include "../template/section-info-title.php" ?>
            </div>
            <!-----------------------Tablas de Estadisticas----------------------->
            <div class="Contenedor-Estadisticas col mt-5">
                <div class="row justify-content-start">
                    <div class="col-6">
                        <canvas id="cantidadMatriculasAnio" class="bg-dark" style="width: 500px;"></canvas>
                    </div>
                    <div class="col-6">
                        <canvas id="cantidadCalificacionesAnio" class="bg-dark" style="width: 500px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- Recursos necesarios -->
<?php include_once "../template/footer.php"; ?>
<!-- ChartJS Matriculas -->
<script src="/js/chartjs/chart.matriculas.js"></script>
<!-- ChartJS Matriculas -->
<script src="/js/chartjs/chart.calificaciones.js"></script>
</html>