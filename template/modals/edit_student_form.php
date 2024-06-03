<div class="modal fade" id="modal_edit_student<?= $estudiante["ID_Estudiante"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Estudiante</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controllers/student.controller.php" method="POST">
                    <input type="hidden" name="modificaStudent" id="modificaStudent" value="<?= $estudiante["ID_Estudiante"]; ?>">

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="priNombre" class="form-label">Primer Nombre <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $estudiante['Pri_Nombre'];?>" class="form-control" id="priNombre" name="priNombre" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="segNombre" class="form-label">Segundo Nombre</label>
                            <input type="text" value="<?= $estudiante['Seg_Nombre'];?>" class="form-control" id="segNombre" name="segNombre" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="priApellido" class="form-label">Primer Apellido <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $estudiante['Pri_Apellido'];?>" class="form-control" id="priApellido" name="priApellido" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="segApellido" class="form-label">Segundo Apellido</label>
                            <input type="text" value="<?= $estudiante['Seg_Apellido'];?>" class="form-control" id="segApellido" name="segApellido" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="cedula" class="form-label">Cédula <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $estudiante['Cedula'];?>" class="form-control" id="cedula" name="cedula" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                            <input type="date" value="<?= $estudiante['Fecha_Nacimiento'];?>" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="genero" class="form-label">Género <span class="text-danger">*</span></label>
                            <select class="form-select" id="genero" name="genero" required>
                                <option value="<?= $estudiante['FK_Genero'];?>"><?= $estudiante['Genero'];?></option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" value="<?= $estudiante['Telefono'];?>" class="form-control" id="telefono" name="telefono" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección <span class="text-danger">*</span></label>
                            <input type="text" value="<?= $estudiante['Direccion'];?>" class="form-control" id="direccion" name="direccion" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                            <input type="email" value="<?= $estudiante['Correo_Electronico'];?>" class="form-control" id="correo" name="correo" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="fkTutor" class="form-label">Codigo del Tutor <span class="text-danger">*</span></label>
                            <input type="number" value="<?= $estudiante['FK_Tutor'];?>" class="form-control" id="fkTutor" name="fkTutor" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="edit_fkParentesco" class="form-label">Parentesco <span class="text-danger">*</span></label>
                            <select name="fkParentesco" id="fkParentesco" class="form-select" required style="background-color: #E5E5E5;">
                                <option value="<?= $estudiante['FK_Parentesco']; ?>"><?= $estudiante['Parentesco']; ?></option>
                                <option value="1">Padré</option>
                                <option value="2">Madré</option>
                                <option value="3">Tutor Legal</option>
                            </select>                         
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
