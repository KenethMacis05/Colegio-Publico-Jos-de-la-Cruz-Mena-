<!DOCTYPE html>
<html lang="en">

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
    <!-- Libreria Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Titulo de la pagina -->
    <title>Usuario | Sistema JDLCM</title>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "../template/dashboard.php" ?>
            <!----------------------Titulo del Header--------------------->
            <div class="col py-3 header">
                <?php #include_once "/template/section-info-title/section-info-title.php"?>
            </div>
            <!-----------------------Config User----------------------->
            <?php #include_once ""?>
        </div>
    </div>
</body>

<!-- Bootstrap JS -->
<script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>