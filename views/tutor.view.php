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
    <title>Turores | Sistema JDLCM</title>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "../template/dashboard.permisos.php" ?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">                
                <?php include "../template/section-info-title.php"?>
            </div>
            <!-----------------------Tabla Periodo escolar----------------------->
            <?php include_once "../template/tables/table.tutor.php" ?>
        </div>
    </div>
    <!-- Modal nuevo tutor -->
    <?php include_once "../template/modals/new_tutor_form.php" ?>
</body>

<!-- Recursos necesarios -->
<?php include_once "../template/footer.php" ?>
<!-- Alertas -->
<?php include_once "../template/alerts/alert_tutor.php"?>

</html>