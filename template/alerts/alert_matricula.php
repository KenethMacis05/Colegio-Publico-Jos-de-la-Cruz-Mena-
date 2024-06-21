<script>
    function alertDeleteMatricula() {
        Swal.fire({
            position: 'top-center',
            icon: 'question',
            title: "¿Desea eliminar esta matricula?",
            text: "Si acepta se eliminara la matricula",
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
                window.location.href = '../controllers/matricula.controller.php?delete=<?= $matricula["ID_Matricula"]; ?>';
            } else if (result.isDenied) {
                console.log("Error al eleminar el usuario")
            }
        });
    }
</script>

<?php
//Crear
if (isset($_GET['create'])) {
    $create = intval($_GET['create']);
    switch ($create) {
        case 1:
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Se creo con éxito!',
                    text: 'Has creado una nueva matricula',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/registration.view.php';
                });
            </script>";
            break;
        case 0:
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo crear',
                    text: 'Ocurrio un error al intentar crear la matricula',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/registration.view.php';
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
                    window.location.href = '../views/registration.view.php';
                });
            </script>";
            break;
    }
}
//Actualizar 
if (isset($_GET['update'])) {
    $update = intval($_GET['update']);
    switch ($update) {
        case 1:
            echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Se actualizo con éxito!',
                        text: 'Has actualizado la matricula',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/registration.view.php';
                    });
                </script>";
            break;
        case 0:
            echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'No se pudo actualizar',
                        text: 'ocurrio un error al intentar actualizar la matricula',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/registration.view.php';
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
                        window.location.href = '../views/registration.view.php';
                    });
                </script>";
            break;
    }
}
//Eliminar
if (isset($_GET['delete'])) {
    $delete = intval($_GET['delete']);
    switch ($delete) {
        case 1:
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Se elimino con éxito!',
                    text: 'Has eliminado la matricula',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/registration.view.php';
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
                    window.location.href = '../views/registration.view.php';
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
                    window.location.href = '../views/registration.view.php';
                });
            </script>";
            break;
    }
}




