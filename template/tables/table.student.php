<div class="bg-dark rounded-4 Contenedor-List col ">
    <!-- Botones de acción -->
    <div class="botones">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_new_student">
            <i class="bi bi-file-earmark-plus"></i>
            Nuevo
        </button>
        <button type="button" class="btn btn-warning" style="color: white" onclick="window.location.href='/report/reports.students.pdf.php'">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            PDF
        </button>
        <button type="button" class="btn btn-secondary" style="color: white" onclick="window.location.href='/report/reports.students.excel.php'">
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
                    <th class="centered">Genero</th>
                    <th class="centered">Telefono</th>
                    <th class="centered">Direccion</th>
                    <th class="centered">Correo</th>
                    <th class="centered">Tutor</th>
                    <th class="centered">Parentesco</th>
                    <th class="centered">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $objEstudiante = new Estudiante();
                $allEstudiantes = $objEstudiante->read();
                $numRows = mysqli_num_rows($allEstudiantes);

                for ($i = 0; $i < $numRows; $i++) {
                    $estudiante = mysqli_fetch_assoc($allEstudiantes);
                ?>
                    <tr>
                        <td><?= $estudiante["ID_Estudiante"] ?></td>
                        <td><?= $estudiante["Pri_Nombre"] . ' ' . $estudiante["Pri_Apellido"] ?></td>
                        <td style="text-align: center;"><?= $estudiante["Genero"] == "Masculino"? '<span>M</span>' : '<span>F</span>'?></td>
                        <td><?= $estudiante["Telefono"] ?></td>
                        <td><?= $estudiante["Direccion"] ?></td>
                        <td><?= $estudiante["Correo_Electronico"] ?></td>
                        <td><?= $estudiante["Tutor"] ?></td>
                        <td><?= $estudiante["Parentesco"] ?></td>
                        <td>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-sm btn-success pdf-button me-1" style="color: white" onclick="window.location.href='/report/report.student.pdf.php?estudiante=<?= $estudiante['ID_Estudiante'] ?>'"><i class="bi bi-file-earmark-pdf-fill"></i></button>
                            <button class="btn btn-sm btn-primary edit-button me-1" data-bs-toggle="modal" data-bs-target="#modal_edit_student<?= $estudiante["ID_Estudiante"]; ?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger retirar-button" onclick="alertDeleteStudent()"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                        <?php include "../template/modals/edit_student_form.php" ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>