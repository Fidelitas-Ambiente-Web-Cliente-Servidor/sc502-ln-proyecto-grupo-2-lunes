$(document).ready(function () {

    let year = $("#year");
    if (year.length) {
        year.text(new Date().getFullYear());
    }

    function hoyFecha() {
        let hoy = new Date();
        let anio = hoy.getFullYear();
        let mes = String(hoy.getMonth() + 1).padStart(2, "0");
        let dia = String(hoy.getDate()).padStart(2, "0");
        return anio + "-" + mes + "-" + dia;
    }

    function contactoValido(texto) {
        texto = $.trim(texto);

        if (texto === "") {
            return false;
        }

        if ($.isNumeric(texto) && texto.length === 8) {
            return true;
        }

        if (texto.indexOf("@") !== -1) {
            return true;
        }

        return false;
    }

    // FILTRO DE ANIMALES
    $("#formularioFiltros").on("submit", function (event) {
        event.preventDefault();

        let nombreBuscado = $.trim($("#buscarNombre").val()).toLowerCase();
        let especieSeleccionada = $("#filtrarEspecie").val();
        let tamanoSeleccionado = $("#filtrarTamano").val();
        let cantidadVisibles = 0;

        $(".mascota").each(function () {
            let nombreMascota = String($(this).data("nombre") || "").toLowerCase();
            let especieMascota = String($(this).data("especie") || "");
            let tamanoMascota = String($(this).data("tamano") || "");

            let cumpleNombre = nombreMascota.indexOf(nombreBuscado) !== -1 || nombreBuscado === "";
            let cumpleEspecie = especieSeleccionada === "todos" || especieMascota === especieSeleccionada;
            let cumpleTamano = tamanoSeleccionado === "todos" || tamanoMascota === tamanoSeleccionado;

            if (cumpleNombre && cumpleEspecie && cumpleTamano) {
                $(this).show();
                cantidadVisibles++;
            } else {
                $(this).hide();
            }
        });

        if ($("#mensajeFiltro").length) {
            if (cantidadVisibles > 0) {
                $("#mensajeFiltro").text("El filtro se aplicó correctamente.").css("color", "green");
            } else {
                $("#mensajeFiltro").text("No se encontraron mascotas con ese filtro.").css("color", "red");
            }
        }
    });

    // GALERIA PERFIL ANIMAL
    if ($("#imagenPrincipalAnimal").length) {
        $("#mini1, #mini2, .mini-galeria img").on("click", function () {
            let nuevaSrc = $(this).attr("src");
            if (nuevaSrc) {
                $("#imagenPrincipalAnimal").attr("src", nuevaSrc);
            }
        });
    }

    // FORMULARIO ADOPCION
    if ($("#formAdopcion").length) {
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

            if ($.trim(edad.val()) === "" || Number(edad.val()) < 18) {
                errores += "<li>Debe ser mayor de edad para enviar la solicitud.</li>";
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

    // FORMULARIO CITA
    if ($("#formCita").length) {
        let contenedor = $(".formulario-proyecto").first();

        if ($("#mensajeErrorCita").length === 0) {
            contenedor.append('<div id="mensajeErrorCita" class="mensaje-formulario mensaje-error" style="display:none;"></div>');
        }

        if ($("#mensajeOkCita").length === 0) {
            contenedor.append('<div id="mensajeOkCita" class="mensaje-formulario mensaje-ok" style="display:none;"></div>');
        }

        function limpiarMensajesCita() {
            $("#mensajeErrorCita").hide().html("");
            $("#mensajeOkCita").hide().html("");
        }

        $("#formCita").on("submit", function (event) {
            let nombre = $("#nombreCita");
            let contacto = $("#contactoCita");
            let fecha = $("#fechaCita");
            let hora = $("#horaCita");
            let personas = $("#personasCita");
            let motivo = $("#motivoCita");
            let comentarios = $("#comentariosCita");

            limpiarMensajesCita();

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

            if ($.trim(fecha.val()) === "") {
                errores += "<li>La fecha es obligatoria.</li>";
                fecha.css("border-color", "red");
            } else if (fecha.val() < hoyFecha()) {
                errores += "<li>La fecha no puede ser anterior a hoy.</li>";
                fecha.css("border-color", "red");
            } else {
                fecha.css("border-color", "#cfdede");
            }

            if ($.trim(hora.val()) === "") {
                errores += "<li>La hora es obligatoria.</li>";
                hora.css("border-color", "red");
            } else if (hora.val() < "10:00" || hora.val() > "18:00") {
                errores += "<li>La cita debe agendarse entre las 10:00 a. m. y las 6:00 p. m.</li>";
                hora.css("border-color", "red");
            } else {
                hora.css("border-color", "#cfdede");
            }

            if ($.trim(personas.val()) === "" || Number(personas.val()) <= 0) {
                errores += "<li>La cantidad de personas debe ser mayor a cero.</li>";
                personas.css("border-color", "red");
            } else {
                personas.css("border-color", "#cfdede");
            }

            if ($.trim(motivo.val()) === "") {
                errores += "<li>Debe seleccionar el motivo de la visita.</li>";
                motivo.css("border-color", "red");
            } else {
                motivo.css("border-color", "#cfdede");
            }

            if ($.trim(comentarios.val()) === "") {
                errores += "<li>Los comentarios no deben estar vacíos.</li>";
                comentarios.css("border-color", "red");
            } else {
                comentarios.css("border-color", "#cfdede");
            }

            if (errores !== "") {
                event.preventDefault();
                $("#mensajeErrorCita").show().html("<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>");
            }
        });
    }

    // FORMULARIO DONACION
    if ($("#formDonacion").length) {
        let contenedor = $(".formulario-proyecto").first();

        if ($("#mensajeErrorDonacion").length === 0) {
            contenedor.append('<div id="mensajeErrorDonacion" class="mensaje-formulario mensaje-error" style="display:none;"></div>');
        }

        if ($("#mensajeOkDonacion").length === 0) {
            contenedor.append('<div id="mensajeOkDonacion" class="mensaje-formulario mensaje-ok" style="display:none;"></div>');
        }

        function limpiarMensajesDonacion() {
            $("#mensajeErrorDonacion").hide().html("");
            $("#mensajeOkDonacion").hide().html("");
        }

        $("#formDonacion").on("submit", function (event) {
            let nombre = $("#nombreDonacion");
            let contacto = $("#contactoDonacion");
            let monto = $("#montoDonacion");
            let metodo = $("#metodoDonacion");

            limpiarMensajesDonacion();

            let errores = "";

            if ($.trim(nombre.val()) === "") {
                errores += "<li>El nombre es obligatorio.</li>";
            }

            if ($.trim(contacto.val()) === "") {
                errores += "<li>El contacto es obligatorio.</li>";
            }

            if ($.trim(monto.val()) === "") {
                errores += "<li>Debe indicar el monto o la donación realizada.</li>";
            }

            if ($.trim(metodo.val()) === "") {
                errores += "<li>Debe seleccionar el método de donación.</li>";
            }

            if (errores !== "") {
                event.preventDefault();
                $("#mensajeErrorDonacion").show().html("<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>");
            }
        });
    }

    // FORMULARIO CONTACTO
    if ($("#formContacto").length) {
        let contenedor = $(".formulario-proyecto").first();

        if ($("#mensajeErrorContacto").length === 0) {
            contenedor.append('<div id="mensajeErrorContacto" class="mensaje-formulario mensaje-error" style="display:none;"></div>');
        }

        if ($("#mensajeOkContacto").length === 0) {
            contenedor.append('<div id="mensajeOkContacto" class="mensaje-formulario mensaje-ok" style="display:none;"></div>');
        }

        function limpiarMensajesContacto() {
            $("#mensajeErrorContacto").hide().html("");
            $("#mensajeOkContacto").hide().html("");
        }

        $("#formContacto").on("submit", function (event) {
            let nombre = $("#nombreContacto");
            let contacto = $("#contactoMensaje");
            let mensaje = $("#mensajeContacto");

            limpiarMensajesContacto();

            let errores = "";

            if ($.trim(nombre.val()) === "") {
                errores += "<li>El nombre es obligatorio.</li>";
            }

            if ($.trim(contacto.val()) === "") {
                errores += "<li>El contacto es obligatorio.</li>";
            } else if (!contactoValido(contacto.val())) {
                errores += "<li>El contacto debe ser un correo o teléfono válido.</li>";
            }

            if ($.trim(mensaje.val()) === "") {
                errores += "<li>El mensaje no puede estar vacío.</li>";
            }

            if (errores !== "") {
                event.preventDefault();
                $("#mensajeErrorContacto").show().html("<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>");
            }
        });
    }

});