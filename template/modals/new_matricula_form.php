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
                            <select placeholder="#_Estudiante" class="form-select" id="FK_Estudiante" name="FK_Estudiante" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                $result = $objComplemento->readEstudiantes();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["ID_Estudiante"] . "'>" . $row["Estudiante"] . "</option>";
                                    }
                                } else {
                                    echo "No results";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Grado" class="form-label">Grado</label>
                            <select class="form-select" id="FK_Grado" name="FK_Grado" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                $result = $objComplemento->readGrados();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["ID_Grado"] . "'>" . $row["Grado"] . "</option>";
                                    }
                                } else {
                                    echo "No results";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Seccion" class="form-label">Sección</label>
                            <select class="form-select" id="FK_Seccion" name="FK_Seccion" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                $result = $objComplemento->readSecciones();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["ID_Seccion"] . "'>" . $row["Seccion"] . "</option>";
                                    }
                                } else {
                                    echo "No results";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Turno" class="form-label">Turno</label>
                            <select class="form-select" id="FK_Turno" name="FK_Turno" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                $result = $objComplemento->readTurnos();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["ID_Turno"] . "'>" . $row["Turno"] . "</option>";
                                    }
                                } else {
                                    echo "No results";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="FK_Estado" class="form-label">Estado</label>
                            <select class="form-select" id="FK_Estado" name="FK_Estado" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                $result = $objComplemento->readEstados();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["ID_Estado"] . "'>" . $row["Estado"] . "</option>";
                                    }
                                } else {
                                    echo "No results";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="anio" class="form-label">Año Lectivo</label>
                            <select class="form-select" id="anio" name="anio" required style="background-color: #E5E5E5;">
                                <option value="<?= $_SESSION['school_period']['ID_Anio_Lectivo']; ?>"><?= $_SESSION['school_period']['Anio']; ?></option>
                            </select>
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