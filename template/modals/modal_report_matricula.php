<div class="modal fade" id="modal_report_matricula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar reportes por Grado y Año</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/report/reports.matriculas.pdf.php" method="POST">
                    
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="FK_Grado" class="form-label">Grado</label>
                            <select class="form-select" id="grado" name="grado" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                    $result = $objComplemento->readGrados();
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='". $row["ID_Grado"]. "'>". $row["Grado"]. "</option>";
                                        }
                                    } else {
                                        echo "No results";
                                    } 
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="anio" class="form-label">Año Lectivo</label>
                            <select class="form-select" id="anio" name="anio" required style="background-color: #E5E5E5;">
                                <option value="" disabled selected>Seleccione...</option>
                                <?php
                                    $result = $objComplemento->readPeriodoEscolar();
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<option value='". $row["ID_Anio_Lectivo"]. "'>". $row["Anio"]. "</option>";
                                        }
                                    } else {
                                        echo "No results";
                                    } 
                                ?>
                            </select>                            
                        </div>                      
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg"></i>
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-success" name="reportPDF" value="ok">
                            <i class="bi bi-search"></i>
                            Buscar reporte
                        </button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
