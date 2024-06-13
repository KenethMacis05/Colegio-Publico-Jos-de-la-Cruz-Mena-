<?php
include_once "../template/zona_priv.php";

$idUsuario = $_SESSION['usuarioautenticado']['ID_USER'];
//$permisos = $_SESSION['usuarioautenticado']['Permisos'];
$usuario = $_SESSION['usuarioautenticado']['Usuario'];
$contrasena = $_SESSION['usuarioautenticado']['Contrasena'];
$priNombre = $_SESSION['usuarioautenticado']['Pri_Nombre'];
$segNombre = $_SESSION['usuarioautenticado']['Seg_Nombre'];
$priApellido = $_SESSION['usuarioautenticado']['Pri_Apellido'];
$segApellido = $_SESSION['usuarioautenticado']['Seg_Apellido'];
$telefono = $_SESSION['usuarioautenticado']['Telefono'];
$correo = $_SESSION['usuarioautenticado']['Correo_Electronico'];
$imagen = $_SESSION['usuarioautenticado']['Imagen'];
?>

<!DOCTYPE html>
<html lang="es-NI">

<head>
    <!-- Meta Data -->
    <?php include_once "../template/metadata.php" ?>
    <!-- Recursos Necesarios -->
    <?php include_once "../template/head.php" ?>    
    <!-- Titulo de la pagina -->
    <title>Usuario | Sistema JDLCM</title>


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
                                                <img src="data:image/*;base64,<?= base64_encode($imagen) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $priNombre . ' ' . $priApellido ?></h4>
                                            <p class="mb-0"><?= $correo ?></p>
                                            <div class="mt-2">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fa fa-fw fa-camera"></i>
                                                    <span>Cambiar Foto</span>
                                                </button>
                                                <button class="btn btn-danger" type="button">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                    <span>Eliminar</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-right">
                                            <span class="badge badge-secondary text-dark">administrator</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        <form class="form" action="../controllers/user.controllers.php" method="POST">
                                            <!-- Inputs -->
                                            <div class="mb-3 row">
                                                <div class="col-md-3">
                                                    <label for="priNombre" class="form-label">Primer Nombre</label>
                                                    <input value="<?= $priNombre; ?>" type="text" class="form-control" id="priNombre" name="priNombre">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="segNombre" class="form-label">Segundo Nombre</label>
                                                    <input value="<?= $segNombre; ?>" type="text" class="form-control" id="segNombre" name="segNombre">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="priApellido" class="form-label">Primer Apellido</label>
                                                    <input value="<?= $priApellido; ?>" type="text" class="form-control" id="priApellido" name="priApellido">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="segApellido" class="form-label">Segundo Apellido</label>
                                                    <input value="<?= $segApellido; ?>" type="text" class="form-control" id="segApellido" name="segApellido">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-3">
                                                    <label for="usuario" class="form-label">Usuario</label>
                                                    <input value="<?= $usuario; ?>" type="text" class="form-control" id="usuario" name="usuario">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="telefono" class="form-label">Telefono</label>
                                                    <input value="<?= $telefono; ?>" type="number" class="form-control" id="telefono" name="telefono">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="correo" class="form-label">Correo Electronico</label>
                                                    <input value="<?= $correo; ?>" type="email" class="form-control" id="correo" name="correo">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-md-6">
                                                    <label for="contrasena" class="form-label">Contraseña</label>
                                                    <input value="<?= $contrasena; ?>" type="text" class="form-control" id="contrasena" name="contrasena">
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
</body>

<!-- Bootstrap JS -->
<script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</html>