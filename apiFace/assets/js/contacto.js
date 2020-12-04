$(document).ready(function() {
    $("#btnComentarios").click(function(e) {
        e.preventDefault();

        guardarComentario();
    });

    async function guardarComentario() {
        const datos = new FormData(document.getElementById('form_contacto'));

        await fetch('assets/data/contacto.php', { 
                method: 'POST',
                body: datos
            })
            .then(response => response.json())
            .then(response => {
                if (response.dato == 'ok') {
                    alert("Información enviada correctamente");
                } else {
                    alert("Datos incorrectos");
                }
            })
            .catch(err => {
                console.log(err);
            });
    }
});