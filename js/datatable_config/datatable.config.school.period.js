function alertModificar() {
    Swal.fire({
        title: "¿Desea modificar el Periodo Escolar?",
        text: "Si acepta podra modificar los datos del periodo escolar",
        showDenyButton: true,
        confirmButtonText: "Si",
        denyButtonText: `No`,
        customClass: {
            popup: 'custom-alerta',
            confirmButton: 'custom-confirmar-button',
            denyButton: 'custom-cancelar-button',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'form_ejemplo_1.html';
        } else if (result.isDenied) {
            /* No pasa nada XD */
        }
    });
}
function alertRetiro() {
    Swal.fire({
        title: "¿Desea desactivar este Periodo Escolar?",
        text: "Si acepta desactivar el Periodo escolar",
        showDenyButton: true,
        confirmButtonText: "Si",
        denyButtonText: `No`,
        customClass: {
            popup: 'custom-alerta',
            confirmButton: 'custom-confirmar-button',
            denyButton: 'custom-cancelar-button',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Retirado con éxito!",
                text: "Has retirado la matricula del alumno",
                customClass: {
                    popup: 'custom-success-alerta',
                    confirmButton: 'custom-confirmar-button',
                }
            }).then(() => {
                window.location.href = 'listado_ejemplo.html';
            });
        } else if (result.isDenied) {
            /* No pasa nada XD */
        }
    });
}
/*------------------------------------------------------------*/
let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    //scrollX: "2000px",
    lengthMenu: [5, 10, 15, 20, 100, 200, 500],
    columnDefs: [
        { className: "centered", targets: [0, 1, 2, 3, 4, 5] },
        { orderable: false, targets: [4, 5] },
        { searchable: false, targets: [1] }
        //{ width: "50%", targets: [0] }
    ],
    pageLength: 5,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún usuario encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún usuario encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }
};

const initDataTable = async () => {
    if (dataTableIsInitialized) {
        dataTable.destroy();
    }

    await listUsers();

    dataTable = $("#datatable_users").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
};

const listUsers = async () => {
    try {
        const response = await fetch("../js/json/school.period.json");
        const users = await response.json();

        let content = ``;
        users.forEach((user, index) => {
            content += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${user.anio}</td>
                    <td>${user.fecha_i}</td>
                    <td>${user.fecha_i}</td>
                    <td><i class="fa-solid fa-check" style="color: green;"></i></td>
                    <td>
                    <button class="btn btn-sm btn-primary edit-button"><i class="fa-solid fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger retirar-button"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>`;
        });
        tableBody_users.innerHTML = content;

        // Agregar escucha de eventos a los botones de edición
        const editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const userIndex = button.dataset.userIndex; // Obtener índice del usuario del atributo data
                alertModificar(userIndex); // Llamar a la función alertModificar con el índice de usuario
            });
        });
        const retButtons = document.querySelectorAll('.retirar-button');
        retButtons.forEach(button => {
            button.addEventListener('click', () => {
                const userIndex = button.dataset.userIndex; // Obtener índice del usuario del atributo data
                alertRetiro(userIndex); // Llamar a la función alertModificar con el índice de usuario
            });
        });
    } catch (ex) {
        alert(ex);
    }
};

window.addEventListener("load", async () => {
    await initDataTable();
});
