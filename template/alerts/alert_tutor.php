<script>
function alertDeleteTutor() {
    Swal.fire({
        position: 'top-center',
        icon: 'question',
        title: "¿Desea eliminar este tutor?",
        text: "Si acepta se eliminara el tutor",
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
            window.location.href = '../controllers/tutor.controller.php?delete_tutor=<?= $tutor["ID_Tutor"]; ?>';       
        } else if (result.isDenied) {
            console.log("Error al eleminar el usuario")
        }
    });
}
</script>
<?php 
    if (isset($_GET['eliminar'])) {
        $delete = intval($_GET['eliminar']); 
        switch ($delete) {
            case 1: echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Se elimino con éxito!',
                        text: 'Has eliminado el tutor',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/tutor.view.php';
                    });
                </script>";    
                break;
            case 0: echo "
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
                        window.location.href = '../views/tutor.view.php';
                    });
                </script>";
                break;
            default: echo "
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
                        window.location.href = '../views/tutor.view.php';
                    });
                </script>";
                break;
        }
    }

    if (isset($_GET['crear'])) {
        $delete = intval($_GET['crear']); 
        switch ($delete) {
            case 1: echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Se creo con éxito!',
                        text: 'Has creado un nuevo tutor',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/tutor.view.php';
                    });
                </script>";    
                break;
            case 0: echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'No se pudo crear',
                        text: 'ocurrio un error al intentar crear el tutor',
                        customClass: {
                            popup: 'custom-success-alerta',
                            confirmButton: 'custom-confirmar-button',
                        }
                    }).then(() => {
                        window.location.href = '../views/tutor.view.php';
                    });
                </script>";
                break;
            default: echo "
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
                        window.location.href = '../views/tutor.view.php';
                    });
                </script>";
                break;
        }
    }
?>  