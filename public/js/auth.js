$(document).ready(function () {

    $("#formLogin").on("submit", function (e) {
        let usuario = $("#usuarioLogin").val().trim();
        let clave = $("#claveLogin").val().trim();
        let mensaje = $("#mensajeLogin");

        mensaje.text("");

        if (usuario === "" || clave === "") {
            e.preventDefault();
            mensaje.text("Todos los campos son obligatorios.");
            mensaje.css("color", "red");
            return;
        }

        if (clave.length < 3) {
            e.preventDefault();
            mensaje.text("La contraseña debe tener al menos 3 caracteres.");
            mensaje.css("color", "red");
            return;
        }

        mensaje.text("Validando...");
        mensaje.css("color", "green");
    });

});