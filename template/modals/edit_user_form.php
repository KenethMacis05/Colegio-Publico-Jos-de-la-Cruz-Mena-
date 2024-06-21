<div class="modal fade" id="modal_edit_user<?= $user["ID_USER"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/user.controllers.php" method="POST">
                    <input type="hidden" name="modificaUser" id="modificaUser" value="<?= $user["ID_USER"];?>">
                    <input type="hidden" name="config" id="config" value="<?= $config;?>">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_tipo_usuario" class="form-label">Tipo de Usuario <span class="text-danger">*</span></label>
                            <select class="form-select" id="tipo_usuario" name="tipo_usuario" style="background-color: #E5E5E5;">
                                <option value="<?= $user["FK_Tipo_User"]; ?>"><?= $user["Permisos"]; ?></option>
                                <option value="1">admin</option>
                                <option value="2">secretario</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_usuario" class="form-label">Usuario <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $user["Usuario"];?>" class="form-control" id="usuario" name="usuario" required style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_contrasena" class="form-label">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" value="<?= $user["Contrasena"];?>" class="form-control" id="contrasena" name="contrasena" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" style="background-color: #E5E5E5;" accept="image/*">
                        </div>                      
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_pri_nombre" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $user["Pri_Nombre"];?>" class="form-control" id="pri_nombre" name="pri_nombre" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_seg_nombre" class="form-label">Segundo Nombre</label>
                            <input type="text" value="<?= $user["Seg_Nombre"];?>" class="form-control" id="seg_nombre" name="seg_nombre" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_pri_apellido" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $user["Pri_Apellido"];?>" class="form-control" id="pri_apellido" name="pri_apellido" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_seg_apellido" class="form-label">Segundo Apellido</label>
                            <input type="text" value="<?= $user["Seg_Apellido"];?>" class="form-control" id="seg_apellido" name="seg_apellido" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" value="<?= $user["Telefono"];?>" class="form-control" id="telefono" name="telefono" style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_correo_electronico" class="form-label">Correo Electrónico</label>
                            <input type="email" value="<?= $user["Correo_Electronico"];?>" class="form-control" id="correo" name="correo" required style="background-color: #E5E5E5;">
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