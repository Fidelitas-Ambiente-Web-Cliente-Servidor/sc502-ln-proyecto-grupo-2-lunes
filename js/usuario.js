document.addEventListener("DOMContentLoaded", function () {

    let year = document.getElementById("year");

    if (year) {
        year.innerText = new Date().getFullYear();
    }

    function contactoValido(texto) {
        if (texto == "") {
            return false;
        }

        if (isNaN(texto) == false && texto.length == 8) {
            return true;
        }

        if (texto.indexOf("@") != -1) {
            return true;
        }

        return false;
    }

    let formPerfil = document.getElementById("formPerfil");

    if (formPerfil) {
        let nombre = document.getElementById("nombrePerfil");
        let correo = document.getElementById("correoPerfil");
        let telefono = document.getElementById("telefonoPerfil");
        let direccion = document.getElementById("direccionPerfil");
        let vivienda = document.getElementById("viviendaPerfil");
        let experiencia = document.getElementById("experienciaPerfil");

        let datoNombre = document.getElementById("datoNombrePerfil");
        let datoCorreo = document.getElementById("datoCorreoPerfil");
        let datoTelefono = document.getElementById("datoTelefonoPerfil");
        let datoDireccion = document.getElementById("datoDireccionPerfil");
        let datoVivienda = document.getElementById("datoViviendaPerfil");
        let datoExperiencia = document.getElementById("datoExperienciaPerfil");

        let contenedor = document.querySelector(".formulario-proyecto");

        let mensajeError = document.createElement("div");
        mensajeError.className = "mensaje-formulario mensaje-error";

        let mensajeOk = document.createElement("div");
        mensajeOk.className = "mensaje-formulario mensaje-ok";

        contenedor.appendChild(mensajeError);
        contenedor.appendChild(mensajeOk);

        function limpiarMensajesPerfil() {
            mensajeError.style.display = "none";
            mensajeError.innerHTML = "";
            mensajeOk.style.display = "none";
            mensajeOk.innerHTML = "";
        }

        formPerfil.addEventListener("submit", function (event) {
            event.preventDefault();
            limpiarMensajesPerfil();

            let errores = "";

            if (nombre.value == "") {
                errores += "<li>El nombre es obligatorio.</li>";
                nombre.style.borderColor = "red";
            } else {
                nombre.style.borderColor = "#cfdede";
            }

            if (correo.value == "") {
                errores += "<li>El correo es obligatorio.</li>";
                correo.style.borderColor = "red";
            } else if (contactoValido(correo.value) == false) {
                errores += "<li>El correo debe ser válido.</li>";
                correo.style.borderColor = "red";
            } else {
                correo.style.borderColor = "#cfdede";
            }

            if (telefono.value == "") {
                errores += "<li>El teléfono es obligatorio.</li>";
                telefono.style.borderColor = "red";
            } else if (isNaN(telefono.value) == true || telefono.value.length != 8) {
                errores += "<li>El teléfono debe tener 8 dígitos.</li>";
                telefono.style.borderColor = "red";
            } else {
                telefono.style.borderColor = "#cfdede";
            }

            if (direccion.value == "") {
                errores += "<li>La dirección es obligatoria.</li>";
                direccion.style.borderColor = "red";
            } else {
                direccion.style.borderColor = "#cfdede";
            }

            if (vivienda.value == "") {
                errores += "<li>Debe seleccionar el tipo de vivienda.</li>";
                vivienda.style.borderColor = "red";
            } else {
                vivienda.style.borderColor = "#cfdede";
            }

            if (experiencia.value == "") {
                errores += "<li>Debe indicar si ha tenido mascotas antes.</li>";
                experiencia.style.borderColor = "red";
            } else {
                experiencia.style.borderColor = "#cfdede";
            }

            if (errores != "") {
                mensajeError.style.display = "block";
                mensajeError.innerHTML = "<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>";
                return;
            }

            datoNombre.innerText = nombre.value;
            datoCorreo.innerText = correo.value;
            datoTelefono.innerText = telefono.value;
            datoDireccion.innerText = direccion.value;
            datoVivienda.innerText = vivienda.value;
            datoExperiencia.innerText = experiencia.value;

            mensajeOk.style.display = "block";
            mensajeOk.innerHTML = "<strong>Perfil actualizado correctamente.</strong>";

            formPerfil.reset();
        });
    }
    let formFiltroSolicitudes = document.getElementById("formFiltroSolicitudes");
    let filtroEstadoSolicitud = document.getElementById("filtroEstadoSolicitud");
    let mensajeFiltroSolicitud = document.getElementById("mensajeFiltroSolicitud");
    let solicitudes = document.querySelectorAll(".solicitud");

    if (formFiltroSolicitudes) {
        formFiltroSolicitudes.addEventListener("submit", function (event) {
            event.preventDefault();

            let estadoSeleccionado = filtroEstadoSolicitud.value;
            let cantidadVisibles = 0;

            for (let i = 0; i < solicitudes.length; i++) {
                let estadoSolicitud = solicitudes[i].getAttribute("data-estado");

                if (estadoSeleccionado == "todas" || estadoSolicitud == estadoSeleccionado) {
                    solicitudes[i].style.display = "block";
                    cantidadVisibles++;
                } else {
                    solicitudes[i].style.display = "none";
                }
            }

            if (cantidadVisibles > 0) {
                mensajeFiltroSolicitud.style.color = "green";
                mensajeFiltroSolicitud.innerText = "El filtro se aplicó correctamente.";
            } else {
                mensajeFiltroSolicitud.style.color = "red";
                mensajeFiltroSolicitud.innerText = "No se encontraron solicitudes con ese estado.";
            }
        });
    }

});