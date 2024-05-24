<div class="modal fade" id="modal_edit_periodo_escolar<?= $periodo["ID_Anio_Lectivo"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Período Escolar</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controllers/school.period.controller.php?update_period=<?= $periodo['ID_Anio_Lectivo']; ?>" method="POST">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado" style="background-color: #E5E5E5;" required>
                                <option><?= $periodo['Estado']; ?></option>
                                <option value="1">Activo</option>
                                <option value="2">Desactivo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="anio" class="form-label">Año Escolar</label>
                            <input type="text" class="form-control" value="<?= $periodo['Anio']; ?>" id="anio" name="anio" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" value="<?= $periodo['Fecha_Inicio']; ?>" id="fecha_inicio" name="fecha_inicio" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_final" class="form-label">Fecha de Final</label>
                            <input type="date" class="form-control" value="<?= $periodo['Fecha_Final']; ?>" id="fecha_final" name="fecha_final" required style="background-color: #E5E5E5;">
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
