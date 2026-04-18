document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('#formLogin, form[action*="loginPost"]');
    if (!form) return;

    const usuario = form.querySelector('#usuarioLogin, input[name="usuario"]');
    const clave = form.querySelector('#claveLogin, input[name="clave"]');
    const mensaje = document.getElementById("mensajeLogin");

    function limpiarCampo(campo) {
        if (!campo) return;
        campo.setCustomValidity("");
        campo.addEventListener("input", function () {
            campo.setCustomValidity("");
            if (mensaje) mensaje.textContent = "";
        });
    }

    limpiarCampo(usuario);
    limpiarCampo(clave);

    form.addEventListener("submit", function (e) {
        if (!usuario || !clave) return;

        const datoUsuario = (usuario.value || "").trim();
        const datoClave = (clave.value || "").trim();

        usuario.setCustomValidity("");
        clave.setCustomValidity("");

        if (datoUsuario === "") {
            e.preventDefault();
            usuario.setCustomValidity("Debe ingresar el usuario o correo.");
            usuario.reportValidity();
            if (mensaje) mensaje.textContent = "Debe ingresar el usuario o correo.";
            return;
        }

        if (datoClave === "") {
            e.preventDefault();
            clave.setCustomValidity("Debe ingresar la contraseña.");
            clave.reportValidity();
            if (mensaje) mensaje.textContent = "Debe ingresar la contraseña.";
            return;
        }

        if (datoClave.length < 3) {
            e.preventDefault();
            clave.setCustomValidity("La contraseña debe tener al menos 3 caracteres.");
            clave.reportValidity();
            if (mensaje) mensaje.textContent = "La contraseña debe tener al menos 3 caracteres.";
            return;
        }

        if (mensaje) mensaje.textContent = "";
    });
});