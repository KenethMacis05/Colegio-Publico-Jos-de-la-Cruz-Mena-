    function cambiarForm() {
    const formEstudiante = document.getElementById("form_estudiante");
    const formTutor = document.getElementById("form_tutor");

    // Define transition properties
    const transition = "all 0.5s ease-in-out"; // Adjust duration and easing as needed

    // Add transition styles to both forms before toggling
    formEstudiante.style.transition = transition;
    formTutor.style.transition = transition;

    // Toggle display
    if (formEstudiante.style.display === "none") {
        formEstudiante.style.display = "block";
        formTutor.style.display = "none";
    } else {
        formEstudiante.style.display = "none";
        formTutor.style.display = "block";
    }
    }


function cambiarFormMatricula() {
    const formTutor = document.getElementById("form_tutor");
    const formMatricula = document.getElementById("form_matricula");
    
    // Define transition properties
    const transition = "all 0.5s ease-in-out"; // Adjust duration and easing as needed
    
    // Add transition styles to both forms before toggling
    formTutor.style.transition = transition;
    formMatricula.style.transition = transition;
    
    // Toggle display
    if (formTutor.style.display === "none") {
        formTutor.style.display = "block";
        formMatricula.style.display = "none";
    } else {
        formTutor.style.display = "none";
        formMatricula.style.display = "block";
    }
}