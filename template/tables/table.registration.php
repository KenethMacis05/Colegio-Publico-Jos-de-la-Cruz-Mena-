<div class="bg-dark rounded-4 Contenedor-List col">
    <!-- Botones de acción -->    
    <div class="botones">
        <button type="button" class="btn btn-success">
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
    <div class="table-responsive">
        <table id="datatable_users" class="table table-striped table-responsive table-light table-hover">
            <caption>
                José de la cruz Mena
                <hr class="mt-3 mb-0 mx-0">
            </caption>
            <thead class="m-4 table-primary">
                <tr>
                    <th class="centered">#</th>
                    <th class="centered">Codigo</th>
                    <th class="centered">Nombre</th>
                    <th class="centered">Telefono</th>
                    <th class="centered">Grado</th>
                    <th class="centered">Turno</th>
                    <th class="centered">Dirrección</th>
                    <th class="centered">Tutor</th>
                    <th class="centered">Status</th>
                    <th class="centered">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $objMatricula = new Matricula();
                $allMatricula = $objMatricula->read();
                $numRows = mysqli_num_rows($allMatricula);
                for ($i = 0; $i < $numRows; $i++) {
                    $matricula = mysqli_fetch_assoc($allMatricula);                
                ?>
                    <tr>
                        <td><?= $matricula["ID_Matricula"] ?></td>
                        <td><?= $matricula["Cod_Matricula"] ?></td>
                        <td><?= $matricula["Pri_Nombre"] . ' ' . $matricula["Pri_Apellido"] ?></td>
                        <td><?= $matricula["Telefono"] ?></td>
                        <td><?= $matricula["Grupo"] ?></td>
                        <td><?= $matricula["Turno"] == "Matutino"  ? "M" : "V" ?></td>
                        <td><?= $matricula["Direccion"] ?></td>
                        <td><?= $matricula["T_Pri_Nombre"] . ' ' . $matricula["T_Pri_Apellido"] ?></td>
                        <td><?= $matricula["Estado"] == "Reingreso"  ? "R" : "N" ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger retirar-button"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>