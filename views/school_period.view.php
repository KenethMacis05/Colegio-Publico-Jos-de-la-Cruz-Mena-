<?php
include_once "../template/zona_priv.php";
include_once "../models/periodoescolar.model.php";
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!-- Meta Data -->
    <?php include_once "../template/metadata.php" ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <!--Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="/css/datatable_css/dataTables.bootstrap5.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- Estilos Header-Title -->
    <link rel="stylesheet" href="/css/header.css">
    <!-- Estilos por defecto -->
    <link rel="stylesheet" href="/css/style.matricula.css">
    <!-- Estilos de alertas -->
    <link rel="stylesheet" href="/css/style.alert.css">
    <!-- Estilos de fuentes -->
    <link rel="stylesheet" href="css/style.font.css">
    <!-- Estilos botones -->
    <link rel="stylesheet" href="/css/style.botones.css">
    <!-- Libreria Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Luego lo tengo que borrar -->
    <link rel="stylesheet" href="/css/borrar.css">
    <!-- Titulo de la pagina -->
    <title>Periodo Escolar | Sistema JDLCM</title>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "../template/dashboard.php" ?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">
                <span class="title">Periodo Escolar</span>
                <?php #include_once "/template/section-info-title/section-info-title.php"
                ?>
            </div>
            <!-----------------------Tabla Periodo escolar----------------------->
            <?php include_once "../template/tables/table.school.period.php" ?>
        </div>
    </div>
    <!-- Modal nuevo periodo escolar -->
    <?php include_once "../template/modals/new_school.period_form.php" ?>
</body>

<!-- Configure table -->
<script src="/js/datatable.config.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="datatables/jquery.min.js"></script>
<script src="/js/jquery.min.js"></script>
<!-- DataTable -->
<script src="/js/datatable_js/jquery.dataTables.min.js"></script>
<script src="/js/datatable_js/dataTables.bootstrap5.min.js"></script>
<!-- Opciones del CRUD -->
<?php include_once "../template/option-crud/option_period.php"?>

</html>