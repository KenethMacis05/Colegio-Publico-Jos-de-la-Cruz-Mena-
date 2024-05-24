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
    <!-- Estilos de fuentes -->
    <link rel="stylesheet" href="css/style.font.css">
    <!-- Estilos botones -->
    <link rel="stylesheet" href="/css/style.botones.css">
    <!-- Libreria Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Luego lo tengo que borrar -->
    <link rel="stylesheet" href="/css/borrar.css">
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
                <span class="title">Usuarios</span>
                <?php #include_once "/template/section-info-title/section-info-title.php"?>
            </div>
            <!-----------------------Tabla Usuarios----------------------->
            <?php include_once "../template/tables/table.users.php" ?>
        </div>
    </div>
    <!-- Modal nuevo periodo escolar -->
    <?php include_once "../template/modals/new_user_form.php" ?>
</body>
<!-- Configure table -->
<script src="/js/datatable.config.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="datatables/jquery.min.js"></script>
<script src="/js/jquery.min.js"></script>
<!-- DataTable -->
<script src="/js/datatable_js/jquery.dataTables.min.js"></script>
<script src="/js/datatable_js/dataTables.bootstrap5.min.js"></script>
<!-- Opciones del CRUD -->
<?php #include_once "../template/option-crud/option_period.php"?>
<script>
function alertDeleteUser() {
    Swal.fire({
        position: 'top-center',
        icon: 'question',
        title: "¿Desea eliminar este usuario?",
        text: "Si acepta se eliminara el usuario",
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
            window.location.href = '../controllers/user.controllers.php?delete_user=<?= $user['ID_USER']; ?>';            
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
                    text: 'Has eliminado el usuario',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/users.view.php';
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
                    window.location.href = '../views/users.view.php';
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
                    window.location.href = '../views/users.view.php';
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
                    text: 'Has creado un nuevo usuario',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/users.view.php';
                });
            </script>";    
            break;
        case 0: echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo crear',
                    text: 'Ocurrio un error al intentar crear el usuario',
                    customClass: {
                        popup: 'custom-success-alerta',
                        confirmButton: 'custom-confirmar-button',
                    }
                }).then(() => {
                    window.location.href = '../views/users.view.php';
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
                    window.location.href = '../views/users.view.php';
                });
            </script>";
            break;
    }
}
?>

</html>