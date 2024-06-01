<div class="modal fade" id="modal_nueva_matricula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva matricula</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/matricula.controllers.php" method="POST">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="Cod_Matricula" class="form-label">Código de Matrícula</label>
                            <input type="text" class="form-control" id="Cod_Matricula" name="Cod_Matricula" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Estudiante" class="form-label">Código Estudiante</label>
                            <input type="number" class="form-control" id="FK_Estudiante" name="FK_Estudiante" required style="background-color: #E5E5E5;">
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Grupo" class="form-label">Grupo</label>
                            <select class="form-select" id="FK_Grupo" name="FK_Grupo" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                    
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Turno" class="form-label">Turno</label>
                            <select class="form-select" id="FK_Turno" name="FK_Turno" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                    
                            </select>
                        </div>                        
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Estado" class="form-label">Estado</label>
                            <select class="form-select" id="FK_Estado" name="FK_Estado" required style="background-color: #E5E5E5;">
                                <option value="">Seleccione...</option>
                                    
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Anio_Lectivo" class="form-label">Año Lectivo</label>
                            <input type="number" class="form-control" id="FK_Anio_Lectivo" name="FK_Anio_Lectivo" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
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