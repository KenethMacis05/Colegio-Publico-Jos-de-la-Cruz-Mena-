<div class="bg-dark rounded-4 Contenedor-List col">
    <!-- Botones de acción -->    
    <div class="botones">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_new_user">
            <i class="bi bi-person-fill-add"></i>
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
    <!--Tabla Usuarios -->
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-responsive table-light table-hover">
            <caption>
                José de la cruz Mena
                <hr class="mt-3 mb-0 mx-0">
            </caption>
            <thead class="m-4 table-primary">
                <tr>
                    <th class="centered ">#</th>
                    <th class="centered">Usuario</th>
                    <th class="centered">Nombre</th>
                    <th class="centered">Permisos</th>
                    <th class="centered">Telefono</th>
                    <th class="centered">Correo</th>
                    <th class="centered">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $objUser = new Users();
                $allUsers = $objUser->read();
                $numRows = mysqli_num_rows($allUsers);

                for ($i = 0; $i < $numRows; $i++) {
                    $user = mysqli_fetch_assoc($allUsers);
                ?>
                    <tr>
                        <td><?= $user["ID_USER"] ?></td>
                        <td><?= $user["Usuario"] ?></td>
                        <td><?= $user["Pri_Nombre"] . ' ' . $user["Pri_Apellido"] ?></td>
                        <td><?= $user["Permisos"] ?></td>
                        <td><?= $user["Telefono"] ?></td>
                        <td><?= $user["Correo_Electronico"] ?></td>
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