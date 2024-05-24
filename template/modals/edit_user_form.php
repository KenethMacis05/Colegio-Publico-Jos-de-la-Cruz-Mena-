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

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_tipo_usuario" class="form-label">Tipo de Usuario</label>
                            <select class="form-select" id="edit_tipo_usuario" name="edit_tipo_usuario" style="background-color: #E5E5E5;">
                                <option><?= $user["FK_Tipo_User"]; ?></option>
                                <option value="">admin</option>
                                <option value="2">secretario</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_usuario" class="form-label">Usuario</label>
                            <input type="text" value="<?= $user["Usuario"];?>" class="form-control" id="edit_usuario" name="edit_usuario" required style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_contrasena" class="form-label">Contraseña</label>
                            <input type="password" value="<?= $user["Contrasena"];?>" class="form-control" id="edit_contrasena" name="edit_contrasena" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_imagen" class="form-label">Imagen</label>
                            <input type="text" value="<?= $user["imagen"];?>" class="form-control" id="edit_imagen" name="edit_imagen" style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_pri_nombre" class="form-label">Primer Nombre</label>
                            <input type="text" value="<?= $user["Pri_Nombre"];?>" class="form-control" id="edit_pri_nombre" name="edit_pri_nombre" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_seg_nombre" class="form-label">Segundo Nombre</label>
                            <input type="text" value="<?= $user["Seg_Nombre"];?>" class="form-control" id="edit_seg_nombre" name="edit_seg_nombre" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_pri_apellido" class="form-label">Primer Apellido</label>
                            <input type="text" value="<?= $user["Pri_Apellido"];?>" class="form-control" id="edit_pri_apellido" name="edit_pri_apellido" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_seg_apellido" class="form-label">Segundo Apellido</label>
                            <input type="text" value="<?= $user["Seg_Apellido"];?>" class="form-control" id="edit_seg_apellido" name="edit_seg_apellido" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="edit_telefono" class="form-label">Teléfono</label>
                            <input type="tel" value="<?= $user["Telefono"];?>" class="form-control" id="edit_telefono" name="edit_telefono" style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_correo_electronico" class="form-label">Correo Electrónico</label>
                            <input type="email" value="<?= $user["Correo_Electronico"];?>" class="form-control" id="edit_correo" name="edit_correo" required style="background-color: #E5E5E5;">
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