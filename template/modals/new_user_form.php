<div class="modal fade" id="modal_new_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/user.controllers.php" method="POST">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="fk_tipo_usuario" class="form-label">Tipo de Usuario</label>
                            <select class="form-select" id="tipo_usuario" name="tipo_usuario" style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                <option value="1">Admin</option>
                                <option value="2">Secretario</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="text" class="form-control" id="imagen" name="imagen" style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="pri_nombre" class="form-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="pri_nombre" name="pri_nombre" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="seg_nombre" class="form-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="seg_nombre" name="seg_nombre" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="pri_apellido" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="pri_apellido" name="pri_apellido" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="seg_apellido" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="seg_apellido" name="seg_apellido" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg"></i>
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-floppy-fill"></i>
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>