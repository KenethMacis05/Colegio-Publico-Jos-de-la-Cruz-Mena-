function alertSave() {
  Swal.fire({
      title: "¿Desea guardar la matrícula?",
      text: "Si acepta ya no podra modificar los datos de la matricúla del alumno desde este apartado",      
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
            title: "¡Matrícula guardada con éxito!",
            customClass: {
                popup: 'custom-success-alerta',
                confirmButton: 'custom-confirmar-button',
            }
          }).then(() => {
            window.location.href = 'registration.view.php';
          });
      } else if (result.isDenied) {
        window.location.href = 'http://localhost/views/registration.view.php';
      }
    });
}

function alertRetiro() {
  Swal.fire({
    title: "¿Desea retirar a este alumno?",
    text: "Si acepta retirará la matricula del alumno",            
    showDenyButton: true,
    confirmButtonText: "Si",
    denyButtonText: `No`,
    customClass: {
        popup: 'custom-alerta',
        confirmButton: 'custom-confirmar-button',
        denyButton: 'custom-cancelar-button',
    }
  }) .then((result) => {
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

function alertModificar() {
  Swal.fire({
    title: "¿Desea modificar la matrícula del alumno?",
    text: "Si acepta podra modificar los datos de la matricúla del alumno ",      
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
