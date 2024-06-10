<div class="bg-dark rounded-4 Contenedor-List col ">
    <!-- Botones de acción -->
    <div class="botones">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_new_tutor">
            <i class="bi bi-file-earmark-plus"></i>
            Nuevo
        </button>
        <button type="button" class="btn btn-warning" style="color: white" onclick="window.location.href='/report/reports.tutores.pdf.php'">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            PDF
        </button>
        <button type="button" class="btn btn-secondary" style="color: white" onclick="window.location.href='/report/reports.tutores.excel.php'">
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
                    <th class="centered">Nombre</th>
                    <th class="centered">Cedula</th>
                    <th class="centered">Telefono</th>
                    <th class="centered">Direccion</th>
                    <th class="centered">Correo</th>
                    <th class="centered">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $objTutor = new Tutor();
                $allTutores = $objTutor->read();
                $numRows = mysqli_num_rows($allTutores);

                for ($i = 0; $i < $numRows; $i++) {
                    $tutor = mysqli_fetch_assoc($allTutores);
                ?>
                    <tr>
                        <td><?= $tutor["ID_Tutor"] ?></td>
                        <td><?= $tutor["Pri_Nombre"] . ' ' . $tutor["Pri_Apellido"] ?></td>
                        <td><?= $tutor["Cedula"] ?></td>
                        <td><?= $tutor["Telefono"] ?></td>
                        <td><?= $tutor["Direccion"] ?></td>
                        <td><?= $tutor["Correo_Electronico"] ?></td>
                        <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-success pdf-button me-1" style="color: white" onclick="window.location.href='/report/report.tutor.pdf.php?tutor=<?= $tutor['ID_Tutor'] ?>'"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                            <button class="btn btn-sm btn-primary edit-button me-1" data-bs-toggle="modal" data-bs-target="#modal_edit_tutor<?= $tutor["ID_Tutor"]; ?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger retirar-button" onclick="alertDeleteTutor()"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                            <?php include "../template/modals/edit_tutor_form.php" ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>