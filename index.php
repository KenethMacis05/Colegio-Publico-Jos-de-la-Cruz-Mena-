<?php
session_start();
if (isset($_SESSION['usuarioautenticado'])) {
	header("Location: home.php");
}
?>

<!doctype html>
<html lang="es-NI">

<head>
	<!--Meta datos-->
	<?php include_once "template/metadata.php" ?>
	<!--Estilos css-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!--Titulo de la pagina-->
	<title>Login</title>
	<link rel="icon" href="src/img/icon.webp" type="png/img">
	<style>
		.fondo {
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center center;
		}
	</style>
</head>

<body class="fondo" style="background-image: url(src/img/bg-school.png);">
	<div class="container-fluid d-flex flex-column">
		<div class="row align-items-center justify-content-center min-vh-100">
			<?php include_once  "template/logger.php" ?>
		</div>
	</div>
</body>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.jquery.min.js"></script>
<script src="js/bootstrap.main.js"></script>

</html>