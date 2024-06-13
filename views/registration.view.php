<?php 
    include_once "../template/zona_priv.php";
    include_once "../models/matricula.model.php";
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!-- Meta Data -->
    <?php include_once "../template/metadata.php" ?>
    <!-- Recursos Necesarios -->
    <?php include_once "../template/head.php" ?>    
    <!-- Titulo de la pagina -->
    <title>Matriculas | Sistema JDLCM</title>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "../template/dashboard.permisos.php" ?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">                
                <?php include_once "../template/section-info-title.php"?>
            </div>
            <!-----------------------Tabla Usuarios----------------------->
            <?php include_once "../template/tables/table.registration.php"?>
        </div>
    </div>
    <!-- Modal nueva matricula -->
    <?php include_once "../template/modals/new_matricula_form.php" ?>
</body>

<!-- Recursos Necesarios -->
<?php include_once "../template/footer.php" ?>    
<!-- Alertas -->
<?php include_once "../template/alerts/alert_matricula.php"?>

</html>