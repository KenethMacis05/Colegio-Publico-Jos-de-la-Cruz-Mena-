<div class="modal fade" id="modal_new_calificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Calificación</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/controllers/calificacion.controller.php" method="POST">
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="FK_Estudiante" class="form-label">Estudiante</label>
                            <input type="number" class="form-control" id="FK_Estudiante" name="FK_Estudiante" required style="background-color: #E5E5E5;" placeholder="Codigo" require>
                        </div>
                        <div class="col-md-4">
                            <label for="FK_Grado" class="form-label">Grado</label>
                            <select class="form-select" id="FK_Grado" name="FK_Grado" required style="background-color: #E5E5E5;" placeholder="Grado" require>
                                <option value="" >Seleccione...</option>
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
                        <div class="col-md-4">
                            <label for="anio" class="form-label">Año Lectivo</label>
                            <select class="form-select" id="anio" name="anio" required style="background-color: #E5E5E5;">
                                <option value="" >Seleccione...</option>
                                <option value="1" >2024</option>
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
                                <td><input class="form-control form-control-sm custom-input" type="number" name="matematica" id="matematica"></td>
                                <td colspan="2">Lengua Extranjera</td>
                                <td><input class="form-control form-control-sm custom-input" type="number" name="lenguaExtranjera" id="lenguaExtranjera"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Lengua Y Literatura</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="lenguaLiteratura" id="lenguaLiteratura"></td>
                                <td colspan="2">Ciencias Naturales</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="cienciasNaturales" id="cienciasNaturales"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Educación Física</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="educacionFisica" id="educacionFisica"></td>
                                <td colspan="2">Química</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="quimica" id="quimica"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Orientacion Tecnica y Vocacional</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="otv" id="otv"></td>
                                <td colspan="2">Física</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="fisica" id="fisica"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Biología</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="biologia" id="biologia"></td>
                                <td colspan="2">Historia</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="historia" id="historia"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Geografía</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="geografia" id="geografia"></td>
                                <td colspan="2">Economía</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="economia" id="economia"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Sociología</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="sociologia" id="sociologia"></td>
                                <td colspan="2">Expresión Cultural y Artistica</td>
                                <td><input class="form-control form-control-sm custom-input" type="text" name="eca" id="eca"></td>
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