$(document).ready(function () {
    let IdHeader = localStorage.getItem("IdHeader");
    if (IdHeader !== null) {
        let seccion = $(IdHeader);
        if (seccion.length > 0) {
            $('html, body').animate({
                scrollTop: seccion.offset().top
            }, 1000); // 1000 representa la duración de la animación en milisegundos
        }
    }
});

$('#sobre-mi-link').on('click', function (e) {
    localStorage.setItem("IdHeader", '#sobre-mi');
});

$('#servicios-link').on('click', function () {
    localStorage.setItem("IdHeader", '#servicios'); 
});

$('#conocimientos-link').on('click', function () {
    localStorage.setItem("IdHeader", '#conocimientos');
});

$('#experiencia-link').on('click', function () {
    localStorage.setItem("IdHeader", '#experiencia');
});