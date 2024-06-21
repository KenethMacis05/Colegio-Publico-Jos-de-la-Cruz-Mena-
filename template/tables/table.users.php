<div class="bg-dark rounded-4 Contenedor-List col">
    <!-- Botones de acción -->    
    <div class="botones">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_new_user">
            <i class="bi bi-person-fill-add"></i>
            Nuevo
        </button>
        <button type="button" class="btn btn-warning" style="color: white" onclick="window.location.href='/report/reports.users.pdf.php'">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            PDF
        </button>
        <button type="button" class="btn btn-secondary" style="color: white" onclick="window.location.href='/report/reports.users.excel.php'">
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
                    <th class="centered">Contraseña</th>
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
                $config = 0;
                for ($i = 0; $i < $numRows; $i++) {
                    $user = mysqli_fetch_assoc($allUsers);
                ?>
                    <tr>
                        <td><?= $user["ID_USER"] ?></td>
                        <td>
                            <div style="display: flex; justify-content: start; align-items: center; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modal_edit_img<?= $user["ID_USER"] ?>">
                                <!-- Verifica si $user['Imagen'] existe -->
                                <?php if (!empty($user['Imagen'])):?>
                                    <div style="border-radius: 50%; width: 30px; height: 30px; overflow: hidden; margin-right: 10px;">
                                        <img src="data:image/*;base64,<?= base64_encode($user['Imagen'])?>" style="width: 100%; height: 100%; object-fit: cover;"> 
                                    </div>
                                <?php else:?>
                                    <!-- Si no hay imagen de perfil, muestra la imagen predeterminada -->
                                    <div style="border-radius: 50%; width: 30px; height: 30px; overflow: hidden; margin-right: 10px;">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqKRdNTUVE6P28Z1Gjw-fwnfsE6icmFmf4eiXXEpmc4A&s" style="width: 100%; height: 100%; object-fit: cover;"> 
                                    </div>
                                <?php endif;?>                                
                                <?= $user["Usuario"]?>
                            </div>
                        </td>
                        <td><?= $user["Contrasena"] ?></td>
                        <td><?= $user["Pri_Nombre"] . ' ' . $user["Pri_Apellido"] ?></td>
                        <td><?= $user["Permisos"] ?></td>
                        <td><?= $user["Telefono"] ?></td>
                        <td><?= $user["Correo_Electronico"] ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary edit-button" data-bs-toggle="modal" data-bs-target="#modal_edit_user<?= $user["ID_USER"];?>"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-sm btn-danger retirar-button" onclick="alertDeleteUser()"><i class="fa-solid fa-trash-can"></i></button>
                            <?php include "../template/modals/edit_user_form.php" ?>
                            <?php include "../template/modals/edit_user_img.php"; $config = 0;?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>       
        </table>
    </div>
</div>