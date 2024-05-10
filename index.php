<!doctype html>
<html lang="es-NI">

<head>
	<!--Meta datos-->
	<?php include_once "template/metadata.php"?>
	<!--Estilos css-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!--Titulo de la pagina-->
	<title>Login</title>
	<link rel="icon" href="src/img/icon.webp" type="png/img">
	<style>
		.fondo{
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
	</style>
</head>

<body class="fondo" style="background-image: url(src/img/bg-school.png);">
	<div class="container-fluid d-flex flex-column">
		<div class="row align-items-center justify-content-center min-vh-100">
			<!--INICIAR SESION-->
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center">
						<h2 class="heading-section">INICIAR SESION</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<form action="controllers/login.controller.php" method="post" class="signin-form">
								<!--Nombre de usuario-->
								<div class="form-group">
									<input type="text" 
									class="form-control" 
									placeholder="Usuario" 
									id="usuario" name="usuario"
									required>
								</div>
								<!--Contraseña de usuario-->
								<div class="form-group">
									<input type="password"
									class="form-control" 
									placeholder="Contraseña"
									id="password" name="password"
									required>
									<span toggle="#password"
										class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">Ingresar</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50">
										<label class="checkbox-wrap checkbox-primary">Acuérdate de mí
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.jquery.min.js"></script>
<script src="js/bootstrap.main.js"></script>
</html>