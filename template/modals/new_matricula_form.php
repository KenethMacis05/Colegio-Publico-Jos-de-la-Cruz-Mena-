<div class="modal fade" id="modal_nueva_matricula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva matricula</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/matricula.controller.php" method="POST">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="Cod_Matricula" class="form-label">Código de Matrícula</label>
                            <input placeholder="M000" type="text" class="form-control" id="Cod_Matricula" name="Cod_Matricula" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Estudiante" class="form-label">Código Estudiante</label>
                            <input placeholder="#_Estudiante" type="number" class="form-control" id="FK_Estudiante" name="FK_Estudiante" required style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Grado" class="form-label">Grado</label>
                            <select class="form-select" id="FK_Grado" name="FK_Grado" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                <option value="1">1ro</option>
                                <option value="2">2do</option>
                                <option value="3">3ro</option>
                                <option value="4">4to</option>
                                <option value="5">5to</option>
                                <option value="6">6to</option>
                                <option value="7">7mo</option>
                                <option value="8">8vo</option>
                                <option value="9">9no</option>
                                <option value="10">10mo</option>
                                <option value="11">11vo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Seccion" class="form-label">Sección</label>
                            <select class="form-select" id="FK_Seccion" name="FK_Seccion" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Turno" class="form-label">Turno</label>
                            <select class="form-select" id="FK_Turno" name="FK_Turno" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                <option value="1">Matutino</option>
                                <option value="2">Vespertido</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Estado" class="form-label">Estado</label>
                            <select class="form-select" id="FK_Estado" name="FK_Estado" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                <option value="1">Reingreso</option>
                                <option value="2">Nuevo Ingreso</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Anio_Lectivo" class="form-label">Año Lectivo</label>
                            <input type="number" class="form-control" id="FK_Anio_Lectivo" name="FK_Anio_Lectivo" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="Fecha_Matricula" class="form-label">Fecha Matricula</label>
                            <input type="date" class="form-control" id="Fecha_Matricula" name="Fecha_Matricula" required>
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
