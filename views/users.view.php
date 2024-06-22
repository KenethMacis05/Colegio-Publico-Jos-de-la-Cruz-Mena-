<?php 
include_once "../template/zona_priv.php";
include_once "../template/permisos.php";
include_once "../models/USERS.model.php";
include_once "../models/complementos.model.php";
$objComplemento = new Complemento;
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!-- Meta Data -->
    <?php include_once "../template/metadata.php" ?>
    <!-- Recursos Necesarios -->
    <?php include_once "../template/head.php" ?>    
    <!-- Titulo de la pagina -->
    <title>Usuarios | Sistema JDLCM</title>
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
            <?php include_once "../template/tables/table.users.php" ?>
        </div>
    </div>
    <!-- Modal nuevo usuario -->
    <?php include_once "../template/modals/new_user_form.php" ?>
</body>

<!-- Recursos necesarios -->
<?php include_once "../template/footer.php" ?>
<!-- Alertas -->
<?php include_once "../template/alerts/alert_users.php"?>

</html>