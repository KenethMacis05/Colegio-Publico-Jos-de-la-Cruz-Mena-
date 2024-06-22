<div class="modal fade" id="modal_edit_calificacion<?= $calificacion['ID_Calificacion']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Calificación</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/calificacion.controller.php" method="POST">
                    <input type="hidden" name="modificaCalificacion" id="modificaCalificacion" value="<?= $calificacion['ID_Calificacion']; ?>">
                    
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="FK_Estudiante" class="form-label">Estudiante</label>
                            <input value="<?= $calificacion['FK_Estudiante']; ?>" type="number" class="form-control" id="FK_Estudiante" name="FK_Estudiante" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-4">
                            <label for="FK_Grado" class="form-label">Grado</label>
                            <select class="form-select" id="FK_Grado" name="FK_Grado" required style="background-color: #E5E5E5;">
                                <option value="<?= $calificacion['FK_Grado']; ?>"><?= $calificacion['Grado']; ?></option>
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
                        <div class="col-md-4">
                            <label for="anio" class="form-label">Año Lectivo</label>
                            <select class="form-select" id="FK_Anio" name="FK_Anio" required style="background-color: #E5E5E5;">
                                <option value="<?= $calificacion['FK_Anio_Lectivo']; ?>" ><?= $calificacion['Anio_Lectivo']; ?></option>
                                <?php
                                $result = $objComplemento->readPeriodoEscolar();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["ID_Anio_Lectivo"] . "'>" . $row["Anio"] . "</option>";
                                    }
                                } else {
                                    echo "No results";
                                }
                                ?>
                            </select>                            
                        </div>              
                    </div>

                    <table class="table table-striped table-dark">
                        <thead class="table-primary">
                            <tr class="bg-primary text-white">
                                <th scope="col" colspan="2">Materia
                                <th>
                                <th scope="col" colspan="4">Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">Matemáticas</td>
                                <td><input class="form-control form-control-sm custom-input" type="number" name="matematica" id="matematica" value="<?= htmlspecialchars($calificacion['Matematica']); ?>"></td>
                                <td colspan="2">Lengua Extranjera</td>
                                <td><input class="form-control form-control-sm custom-input" type="number" name="lenguaExtranjera" id="lenguaExtranjera" value="<?= htmlspecialchars($calificacion['Lengua_Extranjera']); ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Lengua Y Literatura</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="lenguaLiteratura" id="lenguaLiteratura" value="<?= htmlspecialchars($calificacion['Lengua_Literatura']); ?>"></td>
                                <td colspan="2">Ciencias Naturales</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="cienciasNaturales" id="cienciasNaturales" value="<?= htmlspecialchars($calificacion['Ciencias_Naturales']); ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Educación Física</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="educacionFisica" id="educacionFisica" value="<?= htmlspecialchars($calificacion['Educacion_Fisica']); ?>"></td>
                                <td colspan="2">Química</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="quimica" id="quimica" value="<?= htmlspecialchars($calificacion['Quimica']); ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Orientacion Tecnica y Vocacional</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="otv" id="otv" value="<?= htmlspecialchars($calificacion['OTV']); ?>"></td>
                                <td colspan="2">Física</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="fisica" id="fisica" value="<?= htmlspecialchars($calificacion['Fisica']); ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Biología</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="biologia" id="biologia" value="<?= htmlspecialchars($calificacion['Biologia']); ?>"></td>
                                <td colspan="2">Historia</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="historia" id="historia" value="<?= htmlspecialchars($calificacion['Historia']); ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Geografía</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="geografia" id="geografia" value="<?= htmlspecialchars($calificacion['Geografia']); ?>"></td>
                                <td colspan="2">Economía</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="economia" id="economia" value="<?= htmlspecialchars($calificacion['Economia']); ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Sociología</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="sociologia" id="sociologia" value="<?= htmlspecialchars($calificacion['Sociologia']); ?>"></td>
                                <td colspan="2">Expresión Cultural y Artistica</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="eca" id="eca" value="<?= htmlspecialchars($calificacion['ECA']); ?>"></td>
                            </tr>

                        </tbody>
                    </table>
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

<style>
    .custom-input {
        width: 55px;
        background-color: #E5E5E5;
    }
</style>