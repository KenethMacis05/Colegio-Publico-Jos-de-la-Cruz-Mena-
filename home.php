<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta datos-->
    <?php include_once "template/metadata.php"?>
    <!--Estilos css-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/matriculas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Titulo de la pagina-->
    <title>Home</title>
    <link rel="icon" href="src/img/icon.webp" type="png/img">
    <style>
        .nav-pills .nav-link:hover {
            color: #215a94 !important;
        }
        hr {
            color: white;
            width: 100%;
        }
        .fondo{
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
</head>
<body class="fondo" style="background-image: url(src/img/bg-school.png);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include_once "template/dashboard.php"?>
            <div class="col py-3 header">
                <?php include_once "template/section-info-title/section-info-title.php"?>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</html>