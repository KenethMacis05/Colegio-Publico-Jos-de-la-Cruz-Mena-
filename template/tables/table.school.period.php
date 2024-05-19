<div class="bg-dark rounded-4 Contenedor-List col ">
    <div class="table-responsive">
        <table id="datatable_users" class="table table-striped table-responsive table-light table-hover">
            <caption>
                José de la cruz Mena
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
                        <td><?= $periodo["Estado"] ?></td>
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