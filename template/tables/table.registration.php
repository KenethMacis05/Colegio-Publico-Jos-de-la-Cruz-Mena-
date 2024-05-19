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
                    <th class="centered ">#</th>
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
            <tbody id="tableBody_users"></tbody>
        </table>
    </div>
</div>