<script>
    function alertDeleteIMG() {
        Swal.fire({
            position: 'top-center',
            icon: 'question',
            title: "¿Desea eliminar la foto de perfil?",
            text: "Si acepta se eliminara el foto de perfil",
            showDenyButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, bórralo!",
            denyButtonText: `Cancelar`,
            customClass: {
                popup: 'custom-alerta',
                confirmButton: 'custom-confirmar-button',
                denyButton: 'custom-cancelar-button',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../controllers/user.controllers.php?deleteIMG=<?= $idUsuario; ?>';
            } else if (result.isDenied) {
                console.log("Error al eleminar el usuario")
            }
        });
    }
</script>

<?php

//Actualizar IMG
if (isset($_GET['updateIMG'])) {
    $updateIMG = intval($_GET['updateIMG']);
    switch ($updateIMG) {
        case 1:
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Se actualizo con éxito!',
                        text: 'Has actualizado tu foto de perfil',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/user.config.view.php';
                    });
                </script>";
            break;
        case 0:
            echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'No se pudo actualizar',
                        text: 'ocurrio un error al intentar actualizar la foto de perfil',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/user.config.view.php';
                    });
                </script>";
            break;
        default:
            echo "
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error en la base de datos',
                        text: '¿Quiere regresar a la pantalla anterios?',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/user.config.view.php';
                    });
                </script>";
            break;
    }
}

//Actualizar IMG
if (isset($_GET['update'])) {
    $update = intval($_GET['update']);
    switch ($update) {
        case 1:
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Se actualizo con éxito!',
                        text: 'Has actualizado tu información personal',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/user.config.view.php';
                    });
                </script>";
            break;
        case 0:
            echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'No se pudo actualizar',
                        text: 'ocurrio un error al intentar actualizar la información',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/user.config.view.php';
                    });
                </script>";
            break;
        default:
            echo "
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error en la base de datos',
                        text: '¿Quiere regresar a la pantalla anterios?',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/user.config.view.php';
                    });
                </script>";
            break;
    }
}

//Eliminar
if (isset($_GET['deleteIMG'])) {
    $deleteIMG = intval($_GET['deleteIMG']);
    switch ($deleteIMG) {
        case 1:
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Se elimino con éxito!',
                    text: 'Has eliminado la foto de perfil',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/user.config.view.php';
                });
            </script>";
            break;
        case 0:
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo borrar',
                    text: 'ocurrio un error al intentar borrar',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/user.config.view.php';
                });
            </script>";
            break;
        default:
            echo "
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Error en la base de datos',
                    text: '¿Quiere regresar a la pantalla anterios?',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/user.config.view.php';
                });
            </script>";
            break;
    }
}




