$(document).ready(function () {

    let year = $("#year");
    if (year.length) {
        year.text(new Date().getFullYear());
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

    // FORM PERFIL
    if ($("#formPerfil").length) {
        let contenedor = $(".formulario-proyecto").first();

        if ($("#mensajeErrorPerfil").length === 0) {
            contenedor.append('<div id="mensajeErrorPerfil" class="mensaje-formulario mensaje-error" style="display:none;"></div>');
        }

        if ($("#mensajeOkPerfil").length === 0) {
            contenedor.append('<div id="mensajeOkPerfil" class="mensaje-formulario mensaje-ok" style="display:none;"></div>');
        }

        function limpiarMensajesPerfil() {
            $("#mensajeErrorPerfil").hide().html("");
            $("#mensajeOkPerfil").hide().html("");
        }

        $("#formPerfil").on("submit", function (event) {
            let nombre = $("#nombrePerfil");
            let correo = $("#correoPerfil");
            let telefono = $("#telefonoPerfil");
            let direccion = $("#direccionPerfil");
            let vivienda = $("#viviendaPerfil");
            let experiencia = $("#experienciaPerfil");

            let datoNombre = $("#datoNombrePerfil");
            let datoCorreo = $("#datoCorreoPerfil");
            let datoTelefono = $("#datoTelefonoPerfil");
            let datoDireccion = $("#datoDireccionPerfil");
            let datoVivienda = $("#datoViviendaPerfil");
            let datoExperiencia = $("#datoExperienciaPerfil");

            limpiarMensajesPerfil();

            let errores = "";

            if ($.trim(nombre.val()) === "") {
                errores += "<li>El nombre es obligatorio.</li>";
                nombre.css("border-color", "red");
            } else {
                nombre.css("border-color", "#cfdede");
            }

            if ($.trim(correo.val()) === "") {
                errores += "<li>El correo es obligatorio.</li>";
                correo.css("border-color", "red");
            } else if (!contactoValido(correo.val())) {
                errores += "<li>El correo debe ser válido.</li>";
                correo.css("border-color", "red");
            } else {
                correo.css("border-color", "#cfdede");
            }

            if ($.trim(telefono.val()) === "") {
                errores += "<li>El teléfono es obligatorio.</li>";
                telefono.css("border-color", "red");
            } else if (!$.isNumeric(telefono.val()) || telefono.val().length !== 8) {
                errores += "<li>El teléfono debe tener 8 dígitos.</li>";
                telefono.css("border-color", "red");
            } else {
                telefono.css("border-color", "#cfdede");
            }

            if ($.trim(direccion.val()) === "") {
                errores += "<li>La dirección es obligatoria.</li>";
                direccion.css("border-color", "red");
            } else {
                direccion.css("border-color", "#cfdede");
            }

            if ($.trim(vivienda.val()) === "") {
                errores += "<li>Debe seleccionar el tipo de vivienda.</li>";
                vivienda.css("border-color", "red");
            } else {
                vivienda.css("border-color", "#cfdede");
            }

            if ($.trim(experiencia.val()) === "") {
                errores += "<li>Debe indicar si ha tenido mascotas antes.</li>";
                experiencia.css("border-color", "red");
            } else {
                experiencia.css("border-color", "#cfdede");
            }

            if (errores !== "") {
                event.preventDefault();
                $("#mensajeErrorPerfil").show().html("<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>");
                return;
            }

            if (datoNombre.length) datoNombre.text(nombre.val());
            if (datoCorreo.length) datoCorreo.text(correo.val());
            if (datoTelefono.length) datoTelefono.text(telefono.val());
            if (datoDireccion.length) datoDireccion.text(direccion.val());
            if (datoVivienda.length) datoVivienda.text(vivienda.val());
            if (datoExperiencia.length) datoExperiencia.text(experiencia.val());

            $("#mensajeOkPerfil").show().html("<strong>Perfil validado correctamente.</strong>");
        });
    }

    // FILTRO SOLICITUDES
    $("#formFiltroSolicitudes").on("submit", function (event) {
        event.preventDefault();

        let estadoSeleccionado = $("#filtroEstadoSolicitud").val();
        let cantidadVisibles = 0;

        $(".solicitud").each(function () {
            let estadoSolicitud = String($(this).data("estado") || "");

            if (estadoSeleccionado === "todas" || estadoSolicitud === estadoSeleccionado) {
                $(this).show();
                cantidadVisibles++;
            } else {
                $(this).hide();
            }
        });

        if ($("#mensajeFiltroSolicitud").length) {
            if (cantidadVisibles > 0) {
                $("#mensajeFiltroSolicitud").text("El filtro se aplicó correctamente.").css("color", "green");
            } else {
                $("#mensajeFiltroSolicitud").text("No se encontraron solicitudes con ese estado.").css("color", "red");
            }
        }
    });

});