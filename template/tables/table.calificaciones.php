<div class="bg-dark rounded-4 Contenedor-List col ">
    <!-- Botones de acción -->
    <div class="botones">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_new_calificacion">
            <i class="bi bi-file-earmark-plus"></i>
            Nuevo
        </button>
        <button type="button" class="btn btn-warning" style="color: white" data-bs-toggle="modal" data-bs-target="#modal_report_calificaciones">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            PDF
        </button>
        <button type="button" class="btn btn-secondary" style="color: white" onclick="window.location.href='/report/reports.calificaciones.excel.php'">
        <i class="bi bi-file-spreadsheet"></i>
            Excel
        </button>
    </div>
    <!-- Tabla Periodo Escolar-->    
    <div class="table-responsive">            
        <table id="datatable" class="table table-striped table-responsive table-light table-hover">
            <caption>
                José de la cruz Mena
                <hr class="mt-3 mb-0 mx-0">
            </caption>
            <thead class="m-4 table-primary">
                <tr>
                    <th class="centered ">#</th>
                    <th class="centered">Estudiante</th>
                    <th class="centered">Cedula</th>
                    <th class="centered">Telefono</th>
                    <th class="centered">Grado</th>
                    <th class="centered">Añio</th>
                    <th class="centered">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $objCalificacion = new Calificacion();
                $allCalificaciones = $objCalificacion->read();
                $numRows = mysqli_num_rows($allCalificaciones);

                for ($i = 0; $i < $numRows; $i++) {
                    $calificacion = mysqli_fetch_assoc($allCalificaciones);
                ?>
                    <tr>
                        <td><?= $calificacion["ID_Calificacion"] ?></td>
                        <td><?= $calificacion["Estudiante"]?></td>
                        <td><?= $calificacion["Cedula"] ?></td>
                        <td><?= $calificacion["Telefono"] ?></td>
                        <td><?= $calificacion["Grado"] ?></td>
                        <td><?= $calificacion["Anio_Lectivo"] ?></td>
                        <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-secondary view-button me-1" data-bs-toggle="modal" data-bs-target="#modal_view_calificacion<?= $calificacion["ID_Calificacion"]; ?>"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-sm btn-success pdf-button me-1" style="color: white" onclick="window.location.href='/report/report.calificacion.pdf.php?calificacion=<?= $calificacion['ID_Calificacion'] ?>'"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                            <button class="btn btn-sm btn-primary edit-button me-1" data-bs-toggle="modal" data-bs-target="#modal_edit_calificacion<?= $calificacion["ID_Calificacion"]; ?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger retirar-button" onclick="alertDeletecalificacion()"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                            <?php include "../template/modals/edit_calificacion_form.php" ?>
                            <?php include "../template/modals/view_calificacion_form.php" ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>