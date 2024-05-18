<?php 
    include_once "../template/zona_priv.php";
    include_once "../models/USERS.model.php";
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
    <!-- Libreria Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Titulo de la pagina -->
    <title>Usuarios | Sistema JDLCM</title>
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
            <!-----------------------Tabla Usuarios----------------------->
            <div class="bg-dark rounded-4 Contenedor-List col ">
                <div class="table-responsive">
                    <table id="datatable_users" class="table table-striped table-responsive table-light table-hover">
                        <caption>
                            José de la cruz Mena
                        </caption>
                        <thead class="m-4 table-primary">
                            <tr>
                                <th class="centered ">#</th>
                                <th class="centered">Usuario</th>
                                <th class="centered">Nombre</th>
                                <th class="centered">Permisos</th>
                                <th class="centered">Telefono</th>
                                <th class="centered">Correo</th>
                                <th class="centered">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $objUser = new Users();
                                $allUsers = $objUser->read();
                                $numRows = mysqli_num_rows($allUsers); // Obtener el número total de filas

                                for ($i = 0; $i < $numRows; $i++) {
                                    $user = mysqli_fetch_assoc($allUsers);
                            ?>
                            <tr>
                                <td><?= $user["ID_USER"]?></td>
                                <td><?= $user["Usuario"]?></td>
                                <td><?= $user["Pri_Nombre"]. ' '.$user["Pri_Apellido"]?></td>
                                <td><?= $user["Permisos"]?></td>
                                <td><?= $user["Telefono"]?></td>
                                <td><?= $user["Correo_Electronico"]?></td>
                                <td>
                                <button class="btn btn-sm btn-primary edit-button"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-sm btn-danger retirar-button"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Configure table -->
<script src="/js/datatable_config/datatable.config.users.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="datatables/jquery.min.js"></script>
<script src="/js/jquery.min.js"></script>
<!-- DataTable -->
<script src="/js/datatable_js/jquery.dataTables.min.js"></script>
<script src="/js/datatable_js/dataTables.bootstrap5.min.js"></script>

</html>