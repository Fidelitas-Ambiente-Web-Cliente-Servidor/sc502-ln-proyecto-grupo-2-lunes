console.log("publico.js cargó");

document.addEventListener("DOMContentLoaded", function () {
    function valor(campo) {
        return campo ? (campo.value || "").trim() : "";
    }

    function hoyTexto() {
        const hoy = new Date();
        const anio = hoy.getFullYear();
        const mes = String(hoy.getMonth() + 1).padStart(2, "0");
        const dia = String(hoy.getDate()).padStart(2, "0");
        return `${anio}-${mes}-${dia}`;
    }

    function correoValido(texto) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(texto);
    }

    function telefonoValido(texto) {
        return /^[0-9]{8}$/.test(texto);
    }

    function contactoValido(texto) {
        return correoValido(texto) || telefonoValido(texto);
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

    const formFiltro = document.getElementById("formularioFiltros");
    if (formFiltro) {
        formFiltro.addEventListener("submit", function (event) {
            event.preventDefault();

            const nombreBuscado = (document.getElementById("buscarNombre")?.value || "").trim().toLowerCase();
            const especieSeleccionada = document.getElementById("filtrarEspecie")?.value || "todos";
            const tamanoSeleccionado = document.getElementById("filtrarTamano")?.value || "todos";
            const mascotas = document.querySelectorAll(".mascota");
            const mensajeFiltro = document.getElementById("mensajeFiltro");

            let visibles = 0;

            mascotas.forEach(function (mascota) {
                const nombreMascota = String(mascota.dataset.nombre || "").toLowerCase();
                const especieMascota = String(mascota.dataset.especie || "");
                const tamanoMascota = String(mascota.dataset.tamano || "");

                const cumpleNombre = nombreBuscado === "" || nombreMascota.includes(nombreBuscado);
                const cumpleEspecie = especieSeleccionada === "todos" || especieMascota === especieSeleccionada;
                const cumpleTamano = tamanoSeleccionado === "todos" || tamanoMascota === tamanoSeleccionado;

                if (cumpleNombre && cumpleEspecie && cumpleTamano) {
                    mascota.style.display = "";
                    visibles++;
                } else {
                    mascota.style.display = "none";
                }
            });

            if (mensajeFiltro) {
                if (visibles > 0) {
                    mensajeFiltro.textContent = "El filtro se aplicó correctamente.";
                    mensajeFiltro.style.color = "green";
                } else {
                    mensajeFiltro.textContent = "No se encontraron mascotas con ese filtro.";
                    mensajeFiltro.style.color = "red";
                }
            }
        });
    }

    const imagenPrincipal = document.getElementById("imagenPrincipalAnimal");
    if (imagenPrincipal) {
        const minis = document.querySelectorAll("#mini1, #mini2, .mini-galeria img");
        minis.forEach(function (mini) {
            mini.addEventListener("click", function () {
                const nuevaSrc = mini.getAttribute("src");
                if (nuevaSrc) {
                    imagenPrincipal.setAttribute("src", nuevaSrc);
                }
            });
        });
    }

    const formAdopcion = document.querySelector('#formAdopcion, form[action*="guardarSolicitud"]');
if ($("#formAdopcion").length) {
    $("#edadAdopcion").attr("min", "18");

    let contenedor = $(".formulario-proyecto").first();

    if ($("#mensajeErrorAdopcion").length === 0) {
        contenedor.append('<div id="mensajeErrorAdopcion" class="mensaje-formulario mensaje-error" style="display:none;"></div>');
    }

    if ($("#mensajeOkAdopcion").length === 0) {
        contenedor.append('<div id="mensajeOkAdopcion" class="mensaje-formulario mensaje-ok" style="display:none;"></div>');
    }

    function limpiarMensajesAdopcion() {
        $("#mensajeErrorAdopcion").hide().html("");
        $("#mensajeOkAdopcion").hide().html("");
    }

    $("#formAdopcion").on("submit", function (event) {
        let nombre = $("#nombreAdopcion");
        let contacto = $("#contactoAdopcion");
        let edad = $("#edadAdopcion");
        let direccion = $("#direccionAdopcion");
        let familia = $("#familiaAdopcion");
        let experiencia = $("#experienciaAdopcion");
        let vivienda = $("#tipoViviendaAdopcion");
        let motivo = $("#motivoAdopcion");

        limpiarMensajesAdopcion();

        let errores = "";

        if ($.trim(nombre.val()) === "") {
            errores += "<li>El nombre es obligatorio.</li>";
            nombre.css("border-color", "red");
        } else {
            nombre.css("border-color", "#cfdede");
        }

        if ($.trim(contacto.val()) === "") {
            errores += "<li>El contacto es obligatorio.</li>";
            contacto.css("border-color", "red");
        } else if (!contactoValido(contacto.val())) {
            errores += "<li>El contacto debe ser un correo o un teléfono válido.</li>";
            contacto.css("border-color", "red");
        } else {
            contacto.css("border-color", "#cfdede");
        }

        if ($.trim(edad.val()) === "") {
            errores += "<li>La edad es obligatoria.</li>";
            edad.css("border-color", "red");
        } else if (!$.isNumeric(edad.val()) || Number(edad.val()) < 18) {
            errores += "<li>Solo personas mayores o iguales a 18 años pueden enviar la solicitud.</li>";
            edad.css("border-color", "red");
        } else {
            edad.css("border-color", "#cfdede");
        }

        if ($.trim(direccion.val()) === "") {
            errores += "<li>La dirección es obligatoria.</li>";
            direccion.css("border-color", "red");
        } else {
            direccion.css("border-color", "#cfdede");
        }

        if ($.trim(familia.val()) === "") {
            errores += "<li>La descripción de la familia es obligatoria.</li>";
            familia.css("border-color", "red");
        } else {
            familia.css("border-color", "#cfdede");
        }

        if ($.trim(experiencia.val()) === "") {
            errores += "<li>Debe indicar si ha tenido animales antes.</li>";
            experiencia.css("border-color", "red");
        } else {
            experiencia.css("border-color", "#cfdede");
        }

        if ($.trim(vivienda.val()) === "") {
            errores += "<li>Debe seleccionar el tipo de vivienda.</li>";
            vivienda.css("border-color", "red");
        } else {
            vivienda.css("border-color", "#cfdede");
        }

        if ($.trim(motivo.val()) === "") {
            errores += "<li>Debe indicar por qué desea adoptar.</li>";
            motivo.css("border-color", "red");
        } else {
            motivo.css("border-color", "#cfdede");
        }

        if (errores !== "") {
            event.preventDefault();
            $("#mensajeErrorAdopcion").show().html("<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>");
        }
    });
}

    const formCita = document.querySelector('#formCita, form[action*="guardarCita"]');
    if (formCita) {
        limpiarValidezFormulario(formCita);

        const fecha = formCita.querySelector('#fechaCita, input[name="fecha"]');
        const hora = formCita.querySelector('#horaCita, input[name="hora"]');

        if (fecha) {
            fecha.setAttribute("min", hoyTexto());
        }

        if (hora) {
            hora.setAttribute("min", "10:00");
            hora.setAttribute("max", "18:00");
        }

        formCita.addEventListener("submit", function (event) {
            const nombre = formCita.querySelector('#nombreCita, input[name="nombre"]');
            const contacto = formCita.querySelector('#contactoCita, input[name="contacto"]');
            const personas = formCita.querySelector('#personasCita, input[name="personas"]');
            const motivo = formCita.querySelector('#motivoCita, input[name="motivo"], select[name="motivo"]');
            const comentarios = formCita.querySelector('#comentariosCita, textarea[name="comentarios"]');

            if (valor(nombre) === "") {
                event.preventDefault();
                invalidar(nombre, "El nombre es obligatorio.");
                return;
            }

            if (valor(contacto) === "") {
                event.preventDefault();
                invalidar(contacto, "El contacto es obligatorio.");
                return;
            }

            if (!contactoValido(valor(contacto))) {
                event.preventDefault();
                invalidar(contacto, "El contacto debe ser un correo válido o un teléfono de 8 dígitos.");
                return;
            }

            if (valor(fecha) === "") {
                event.preventDefault();
                invalidar(fecha, "La fecha es obligatoria.");
                return;
            }

            if (valor(fecha) < hoyTexto()) {
                event.preventDefault();
                invalidar(fecha, "La fecha no puede ser anterior a hoy.");
                return;
            }

            if (valor(hora) === "") {
                event.preventDefault();
                invalidar(hora, "La hora es obligatoria.");
                return;
            }

            if (valor(hora) < "10:00" || valor(hora) > "18:00") {
                event.preventDefault();
                invalidar(hora, "La cita debe agendarse entre las 10:00 y las 18:00.");
                return;
            }

            if (valor(personas) === "") {
                event.preventDefault();
                invalidar(personas, "La cantidad de personas es obligatoria.");
                return;
            }

            if (Number(valor(personas)) <= 0) {
                event.preventDefault();
                invalidar(personas, "La cantidad de personas debe ser mayor a 0.");
                return;
            }

            if (valor(motivo) === "") {
                event.preventDefault();
                invalidar(motivo, "El motivo de la cita es obligatorio.");
                return;
            }

            if (valor(comentarios) === "") {
                event.preventDefault();
                invalidar(comentarios, "Los comentarios son obligatorios.");
                return;
            }
        });
    }

    const formDonacion = document.querySelector('#formDonacion, form[action*="guardarDonacion"]');
    if (formDonacion) {
        limpiarValidezFormulario(formDonacion);

        formDonacion.addEventListener("submit", function (event) {
            const nombre = formDonacion.querySelector('#nombreDonacion, input[name="nombre"]');
            const contacto = formDonacion.querySelector('#contactoDonacion, input[name="contacto"]');
            const monto = formDonacion.querySelector('#montoDonacion, input[name="monto"]');
            const metodo = formDonacion.querySelector('#metodoDonacion, select[name="metodo"]');

            if (valor(nombre) === "") {
                event.preventDefault();
                invalidar(nombre, "El nombre es obligatorio.");
                return;
            }

            if (valor(contacto) === "") {
                event.preventDefault();
                invalidar(contacto, "El contacto es obligatorio.");
                return;
            }

            if (!contactoValido(valor(contacto))) {
                event.preventDefault();
                invalidar(contacto, "El contacto debe ser un correo válido o un teléfono de 8 dígitos.");
                return;
            }

            if (valor(monto) === "") {
                event.preventDefault();
                invalidar(monto, "Debe indicar el monto de la donación.");
                return;
            }

            if (Number(valor(monto)) <= 0) {
                event.preventDefault();
                invalidar(monto, "El monto debe ser mayor a 0.");
                return;
            }

            if (valor(metodo) === "") {
                event.preventDefault();
                invalidar(metodo, "Debe seleccionar un método de donación.");
            }
        });
    }

    const formContacto = document.querySelector('#formContacto');
    if (formContacto) {
        limpiarValidezFormulario(formContacto);

        formContacto.addEventListener("submit", function (event) {
            const nombre = formContacto.querySelector('#nombreContacto, input[name="nombre"]');
            const contacto = formContacto.querySelector('#contactoMensaje, input[name="contacto"]');
            const mensaje = formContacto.querySelector('#mensajeContacto, textarea[name="mensaje"]');

            if (valor(nombre) === "") {
                event.preventDefault();
                invalidar(nombre, "El nombre es obligatorio.");
                return;
            }

            if (valor(contacto) === "") {
                event.preventDefault();
                invalidar(contacto, "El contacto es obligatorio.");
                return;
            }

            if (!contactoValido(valor(contacto))) {
                event.preventDefault();
                invalidar(contacto, "El contacto debe ser un correo válido o un teléfono de 8 dígitos.");
                return;
            }

            if (valor(mensaje) === "") {
                event.preventDefault();
                invalidar(mensaje, "El mensaje no puede estar vacío.");
                return;
            }

            if (valor(mensaje).length < 10) {
                event.preventDefault();
                invalidar(mensaje, "El mensaje debe tener al menos 10 caracteres.");
            }
        });
    }
});