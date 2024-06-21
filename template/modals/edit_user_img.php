<div class="modal fade" id="modal_edit_img<?= $user["ID_USER"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Foto de Perfil</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/user.controllers.php" method="POST" autocomplete="on" enctype="multipart/form-data">
                    <input type="hidden" name="modificaIMG" id="modificaIMG" value="<?= $user["ID_USER"] ?>">
                    <input type="hidden" name="config" id="config" value="<?= $config ?>">
                    <div class="d-flex flex-column align-items-center mb-2">
                        <div style="border-radius: 50%; width: 150px; height: 150px; overflow: hidden; border: 5px solid #0D6EFD;">
                            <img src="data:image/*;base64,<?= base64_encode($user['Imagen']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <h2><?php echo $user['Usuario'] ?></h2>
                    </div>
                    <label class="form-label" for="imagen">Nueva Foto de Perfil</label>
                    <input type="file" class="form-control" id="img" name="img" value="" require accept="image/*">

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