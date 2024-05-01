//Pantalla de carga
window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    preloader.style.display = "none";
});
//Nav
const nav = document.querySelector("#nav");
const abrir = document.querySelector("#abrir");
const cerrar = document.querySelector("#cerrar");

abrir.addEventListener("click", () => {
    nav.classList.add("visible");
})

cerrar.addEventListener("click", () => {
    nav.classList.remove("visible");
})
//Mostras las imagenes de la galeria
function IMGaMostrar(image) {
    const DivAmpliado = document.getElementById("DivAmpliado");
    const ImagenAmpliadaSrc = document.getElementById("ImagenAmpliadaSrc");

    ImagenAmpliadaSrc.src = image.src;
    DivAmpliado.style.display = "flex";
}
function CerrarDiv() {
    const DivAmpliado = document.getElementById("DivAmpliado");
    DivAmpliado.style.display = "none";
}
