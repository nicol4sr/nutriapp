function loadImage(event) {
    const imagen = document.getElementById("preview");
    imagen.src = URL.createObjectURL(event.target.files[0]);
}
