document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input-tabla input[type="number"]');
    inputs.forEach(input => {
        input.addEventListener('change', function() {
            if (this.value > 100) {
                this.value = 100;
                alert('La nota máxima permitida es 100.');
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    function validarTelefono(telefono) {
        const regex = /^\d{8}$/;
        return regex.test(telefono);
    }
    function manejarInput(event) {
        const telefono = event.target.value;
        const isValid = validarTelefono(telefono);
        if (!isValid) {
            event.target.setCustomValidity("El teléfono debe tener exactamente 8 dígitos.");
        } else {
            event.target.setCustomValidity("");
        }
    }
    function manejarSubmit(event) {
        const telefonos = document.querySelectorAll('input[type="tel"][name="telefono"]');
        let valido = true;

        telefonos.forEach(function(telefono) {
            if (!validarTelefono(telefono.value)) {
                valido = false;
                alert('El teléfono celular debe tener exactamente 8 dígitos.');
            }
        });
        if (!valido) {
            event.preventDefault();
        }
    }
    const telefonos = document.querySelectorAll('input[type="tel"][name="telefono"]');
    telefonos.forEach(function(telefono) {
        telefono.addEventListener('input', manejarInput);
    });
    document.querySelector('form').addEventListener('submit', manejarSubmit);
});
