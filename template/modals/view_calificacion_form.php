<div class="modal fade" id="modal_view_calificacion<?= $calificacion['ID_Calificacion'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Calificación de <?= htmlspecialchars($calificacion["Estudiante"]);?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-dark">
                    <thead class="table-primary">
                        <tr class="bg-primary text-white">
                            <th scope="col" colspan="2">Materia<th>
                            <th scope="col" colspan="4">Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">Matemáticas</td>
                            <td><?= htmlspecialchars($calificacion['Matematica']); ?></td>
                            <td colspan="2">Lengua Extranjera</td>
                            <td><?= htmlspecialchars($calificacion['Lengua_Extranjera']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Lengua Y Literatura</td>
                            <td><?= htmlspecialchars($calificacion['Lengua_Literatura']); ?></td>
                            <td colspan="2">Ciencias Naturales</td>
                            <td><?= htmlspecialchars($calificacion['Ciencias_Naturales']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Educación Física</td>
                            <td><?= htmlspecialchars($calificacion['Educacion_Fisica']); ?></td>
                            <td colspan="2">Química</td>
                            <td><?= htmlspecialchars($calificacion['Quimica']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Orientacion Tecnica y Vocacional</td>
                            <td><?= htmlspecialchars($calificacion['OTV']); ?></td>
                            <td colspan="2">Física</td>
                            <td><?= htmlspecialchars($calificacion['Fisica']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Biología</td>
                            <td><?= htmlspecialchars($calificacion['Biologia']); ?></td>
                            <td lass="mater" colspan="2">Historia</td>
                            <td><?= htmlspecialchars($calificacion['Historia']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Geografía</td>
                            <td><?= htmlspecialchars($calificacion['Geografia']); ?></td>
                            <td colspan="2">Economía</td>
                            <td><?= htmlspecialchars($calificacion['Economia']); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Sociología</td>
                            <td><?= htmlspecialchars($calificacion['Sociologia']); ?></td>
                            <td colspan="2">Expresión Cultural y Artistica</td>
                            <td><?= htmlspecialchars($calificacion['ECA']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
