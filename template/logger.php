<!--INICIAR SESION-->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 text-center">
			<?php 
			if (isset($_GET['error'])) {
				echo '<span class="text-white fs-5">Usuario y/o contraseña </span>
					<h2 class="heading-section fs-1">INCORRECTOS</h2>';
			} else {
				echo '<h2 class="heading-section">INICIAR SESION</h2>';				
			};
			?>			
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-4">
			<div class="login-wrap p-0">
				<form action="controllers/login.controller.php" method="post" class="signin-form">
					<!--Nombre de usuario-->
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required>
					</div>
					<!--Contraseña de usuario-->
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required>
						<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3">Ingresar</button>
					</div>
					<div class="form-group d-md-flex">
						<div class="w-50">
							<label class="checkbox-wrap checkbox-primary">Acuérdate de mí
								<input type="checkbox" name="recordarme" id="recordarme" value="true">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>