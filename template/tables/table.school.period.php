<div class="bg-dark rounded-4 Contenedor-List col ">
    <!-- Botones de acción -->
    <div class="botones">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_new_periodo_escolar">
            <i class="bi bi-file-earmark-plus"></i>
            Nuevo
        </button>
        <button type="button" class="btn btn-warning" style="color: white">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            PDF
        </button>
        <button type="button" class="btn btn-secondary" style="color: white">
        <i class="bi bi-file-spreadsheet"></i>
            Excel
        </button>
    </div>
    <!-- Tabla Periodo Escolar-->    
    <div class="table-responsive">            
        <table id="datatable_users" class="table table-striped table-responsive table-light table-hover">
            <caption>
                José de la cruz Mena
                <hr class="mt-3 mb-0 mx-0">
            </caption>
            <thead class="m-4 table-primary">
                <tr>
                    <th class="centered ">#</th>
                    <th class="centered">Añio</th>
                    <th class="centered">Fecha de inicio</th>
                    <th class="centered">Fecha de culminación</th>
                    <th class="centered">Estado</th>
                    <th class="centered">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $objPeriodoEscolar = new PeriodoEscolar();
                $allPeriodos = $objPeriodoEscolar->read();
                $numRows = mysqli_num_rows($allPeriodos);

                for ($i = 0; $i < $numRows; $i++) {
                    $periodo = mysqli_fetch_assoc($allPeriodos);
                ?>
                    <tr>
                        <td><?= $periodo["ID_Anio_Lectivo"] ?></td>
                        <td><?= $periodo["Anio"] ?></td>
                        <td><?= $periodo["Fecha_Inicio"] ?></td>
                        <td><?= $periodo["Fecha_Final"] ?></td>
                        <td>
                            <?= $periodo["Estado"] == 
                                "Activo"? '<i class="fa-solid fa-check" style="color: green;"></i> <span style="color: green;">'.$periodo["Estado"].'</span>' 
                                : '<i class="bi bi-x-lg" style="color: red;"></i> <span style="color: red;">'.$periodo["Estado"].'</span>'
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger retirar-button" onclick="window.location='../controllers/school.period.controller.php?delete_period=<?= $periodo['ID_Anio_Lectivo']; ?>'"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>