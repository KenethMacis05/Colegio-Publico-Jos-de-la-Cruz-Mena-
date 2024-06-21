<?php
include_once "../template/zona_priv.php";
include_once '../models/USERS.model.php';

$idUsuario = $_SESSION['usuarioautenticado']['ID_USER'];
$objUsuario = new Users;
if ($resultado = $objUsuario->readID($idUsuario)) {
    $user = mysqli_fetch_assoc($resultado);
} else {
    echo 'error';
}

if (isset($_GET['update'])) {
    $_SESSION['usuarioautenticado']['ID_USER'] = $user['ID_USER'];
    $_SESSION['usuarioautenticado']['FK_Tipo_User'] = $user['FK_Tipo_User'];
    $_SESSION['usuarioautenticado']['Usuario'] = $user['Usuario'];
    $_SESSION['usuarioautenticado']['Contrasena'] = $user['Contrasena'];
    $_SESSION['usuarioautenticado']['Pri_Nombre'] = $user['Pri_Nombre'];
    $_SESSION['usuarioautenticado']['Seg_Nombre'] = $user['Seg_Nombre'];
    $_SESSION['usuarioautenticado']['Pri_Apellido'] = $user['Pri_Apellido'];
    $_SESSION['usuarioautenticado']['Seg_Apellido'] = $user['Seg_Apellido'];
    $_SESSION['usuarioautenticado']['Telefono'] = $user['Telefono'];
    $_SESSION['usuarioautenticado']['Correo_Electronico'] = $user['Correo_Electronico'];
    $_SESSION['usuarioautenticado']['Permisos'] = $user['Permisos'];
}
if (isset($_GET['updateIMG'])) {
    $_SESSION['usuarioautenticado']['Imagen'] = $user['Imagen'];
}
$config = 1;
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!-- Meta Data -->
    <?php include_once "../template/metadata.php" ?>
    <!-- Recursos Necesarios -->
    <?php include_once "../template/head.php" ?>    
    <!-- Titulo de la pagina -->
    <title>Configuraciones | Sistema JDLCM</title>


    <style>
        .container {
            margin: 35px 3%;
            height: 50px;
            color: white;
            width: 75vw;
            padding: 0px;
        }

        .header {
            background-color: #212529;
            width: auto;
            margin: 0;
            box-shadow: -5px 5px 5px rgba(73, 80, 104, 0.4);
            border-radius: 0.4em;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
        }

        .title {
            font-size: 1.25em;
            font-weight: 500;
        }

        .dataTables_info,
        .dataTables_length,
        .dataTables_filter {
            color: white !important;
        }

        .main {
            background-color: #363f48;
            width: auto;
            height: auto;
            margin: 0;
            box-shadow: -5px 5px 5px rgba(73, 80, 104, 0.4);
            border-radius: 0.4em;
            padding: 15px;
        }
    </style>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!--------------------------Dashboard------------------------->
            <?php include_once "../template/dashboard.permisos.php" ?>
            <!----------------------Titulo del Header--------------------->
            <div class="container">
                <div class="header">
                    <?php include_once "../template/section-info-title.php"?>
                </div>
                <div class="main mt-5">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 120px; ">
                                            <div style="border-radius: 50%; width: 120px; height: 120px; overflow: hidden; border: 5px solid #0D6EFD;">
                                                <img src="data:image/*;base64,<?= base64_encode($user['Imagen']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $user['Pri_Nombre'] . ' ' . $user['Seg_Apellido'] ?></h4>
                                            <p class="mb-0"><?= $user['Correo_Electronico'] ?></p>
                                            <div class="mt-2">
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_edit_img<?= $user['ID_USER'] ?>">
                                                    <i class="fa fa-fw fa-camera"></i>
                                                    <span>Cambiar Foto</span>
                                                </button>
                                                <button class="btn btn-danger" onclick="alertDeleteIMG()">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                    <span>Eliminar</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-right">
                                            <span class="badge badge-secondary">Administrador</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <form class="form" action="../controllers/user.controllers.php" method="POST">
                                            <input type="hidden" value="<?= $user['ID_USER']; ?>" name="modificaUser" id="modificaUser">
                                            <input type="hidden" value="<?= $user['FK_Tipo_User']; ?>" name="tipo_usuario" id="tipo_usuario">
                                            <input type="hidden" name="config" id="config" value="<?= $config ?>">
                                            <!-- Inputs -->
                                            <div class="mb-3 row">
                                                <div class="col-md-3">
                                                    <label for="priNombre" class="form-label">Primer Nombre</label>
                                                    <input value="<?= $user['Pri_Nombre']; ?>" type="text" class="form-control" id="pri_nombre" name="pri_nombre" require>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="segNombre" class="form-label">Segundo Nombre</label>
                                                    <input value="<?= $user['Seg_Nombre']; ?>" type="text" class="form-control" id="seg_nombre" name="seg_nombre" require>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="priApellido" class="form-label">Primer Apellido</label>
                                                    <input value="<?= $user['Pri_Apellido']; ?>" type="text" class="form-control" id="pri_apellido" name="pri_apellido" require>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="segApellido" class="form-label">Segundo Apellido</label>
                                                    <input value="<?= $user['Seg_Apellido']; ?>" type="text" class="form-control" id="seg_apellido" name="seg_apellido" require>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-3">
                                                    <label for="usuario" class="form-label">Usuario</label>
                                                    <input value="<?= $user['Usuario']; ?>" type="text" class="form-control" id="usuario" name="usuario" require>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="telefono" class="form-label">Telefono</label>
                                                    <input value="<?= $user['Telefono']; ?>" type="number" class="form-control" id="telefono" name="telefono" require>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="correo" class="form-label">Correo Electronico</label>
                                                    <input value="<?= $user['Correo_Electronico']; ?>" type="email" class="form-control" id="correo" name="correo" require>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label for="contrasena" class="form-label">Contraseña</label>
                                                    <input value="<?= $user['Contrasena']; ?>" type="text" class="form-control" id="contrasena" name="contrasena" require>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success"><i class="bi bi-floppy-fill"></i> Guardar cambios</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once '../template/modals/edit_user_img.php' ?>    
</body>

<?php include_once '../template/footer.php' ?>    
<?php include_once '../template/alerts/alert_users_config.php' ?>    
<!-- Bootstrap JS -->
<script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>