document.addEventListener("DOMContentLoaded", function () {
    function valor(campo) {
        return campo ? (campo.value || "").trim() : "";
    }

    function correoValido(texto) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(texto);
    }

    function telefonoValido(texto) {
        return /^[0-9]{8}$/.test(texto);
    }

    function limpiarValidezFormulario(form) {
        if (!form) return;
        const campos = form.querySelectorAll("input, textarea, select");
        campos.forEach(function (campo) {
            campo.addEventListener("input", function () {
                campo.setCustomValidity("");
            });
            campo.addEventListener("change", function () {
                campo.setCustomValidity("");
            });
        });
    }

    function invalidar(campo, mensaje) {
        if (!campo) return false;
        campo.setCustomValidity(mensaje);
        campo.reportValidity();
        campo.focus();
        return true;
    }

    const year = document.getElementById("year");
    if (year) {
        year.textContent = new Date().getFullYear();
    }

    const formPerfil = document.querySelector('#formPerfil, form[action*="actualizarPerfil"]');
    if (formPerfil) {
        limpiarValidezFormulario(formPerfil);

        formPerfil.addEventListener("submit", function (event) {
            const nombre = formPerfil.querySelector('#nombrePerfil, #nombre, input[name="nombre"]');
            const correo = formPerfil.querySelector('#correoPerfil, #correo, input[name="correo"]');
            const telefono = formPerfil.querySelector('#telefonoPerfil, #telefono, input[name="telefono"]');
            const direccion = formPerfil.querySelector('#direccionPerfil, #direccion, input[name="direccion"]');
            const vivienda = formPerfil.querySelector('#viviendaPerfil, #vivienda, select[name="vivienda"], input[name="vivienda"]');
            const experiencia = formPerfil.querySelector('#experienciaPerfil, #experiencia, select[name="experiencia"], input[name="experiencia"]');

            if (valor(nombre) === "") {
                event.preventDefault();
                invalidar(nombre, "El nombre es obligatorio.");
                return;
            }

            if (valor(correo) === "") {
                event.preventDefault();
                invalidar(correo, "El correo es obligatorio.");
                return;
            }

            if (!correoValido(valor(correo))) {
                event.preventDefault();
                invalidar(correo, "Debe ingresar un correo válido.");
                return;
            }

            if (valor(telefono) === "") {
                event.preventDefault();
                invalidar(telefono, "El teléfono es obligatorio.");
                return;
            }

            if (!telefonoValido(valor(telefono))) {
                event.preventDefault();
                invalidar(telefono, "El teléfono debe tener 8 dígitos.");
                return;
            }

            if (valor(direccion) === "") {
                event.preventDefault();
                invalidar(direccion, "La dirección es obligatoria.");
                return;
            }

            if (valor(vivienda) === "") {
                event.preventDefault();
                invalidar(vivienda, "Debe seleccionar el tipo de vivienda.");
                return;
            }

            if (valor(experiencia) === "") {
                event.preventDefault();
                invalidar(experiencia, "Debe indicar la experiencia con mascotas.");
            }
        });
    }

    const formFiltroSolicitudes = document.getElementById("formFiltroSolicitudes");
    if (formFiltroSolicitudes) {
        formFiltroSolicitudes.addEventListener("submit", function (event) {
            event.preventDefault();

            const estadoSeleccionado = document.getElementById("filtroEstadoSolicitud")?.value || "todas";
            const filas = document.querySelectorAll(".solicitud");
            const mensaje = document.getElementById("mensajeFiltroSolicitud");

            let visibles = 0;

            filas.forEach(function (fila) {
                const estado = String(fila.dataset.estado || "");

                if (estadoSeleccionado === "todas" || estado === estadoSeleccionado) {
                    fila.style.display = "";
                    visibles++;
                } else {
                    fila.style.display = "none";
                }
            });

            if (mensaje) {
                if (visibles > 0) {
                    mensaje.textContent = "El filtro se aplicó correctamente.";
                    mensaje.style.color = "green";
                } else {
                    mensaje.textContent = "No se encontraron solicitudes con ese estado.";
                    mensaje.style.color = "red";
                }
            }
        });
    }
});