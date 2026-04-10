$(document).ready(function () {

    let year = $("#year");
    if (year.length) {
        year.text(new Date().getFullYear());
    }

    function mostrarMensaje(idMensaje, texto, color) {
        let mensaje = $("#" + idMensaje);
        if (mensaje.length) {
            mensaje.text(texto);
            mensaje.css("color", color);
        }
    }

    function textoVacio(valor) {
        return $.trim(valor) === "";
    }

    function validarFechaRango(fechaInicio, fechaFin) {
        return new Date(fechaInicio) <= new Date(fechaFin);
    }

    // VALIDACION ANIMALES
    $("#formAnimales").on("submit", function (e) {
        let nombre = $.trim($("#nombreAnimal").val());
        let especie = $.trim($("#especieAnimal").val());
        let edad = $.trim($("#edadAnimal").val());
        let tamano = $.trim($("#tamanoAnimal").val());
        let estado = $.trim($("#estadoAnimal").val());
        let descripcion = $.trim($("#descripcionAnimal").val());

        if (textoVacio(nombre) || textoVacio(especie) || textoVacio(edad) || textoVacio(tamano) || textoVacio(estado) || textoVacio(descripcion)) {
            e.preventDefault();
            mostrarMensaje("mensajeAnimales", "Todos los campos del formulario de animales son obligatorios.", "red");
            return;
        }

        if (Number(edad) < 0) {
            e.preventDefault();
            mostrarMensaje("mensajeAnimales", "La edad no puede ser negativa.", "red");
            return;
        }

        if (descripcion.length < 10) {
            e.preventDefault();
            mostrarMensaje("mensajeAnimales", "La descripción debe tener al menos 10 caracteres.", "red");
            return;
        }

        mostrarMensaje("mensajeAnimales", "Formulario correcto.", "green");
    });

    // VALIDACION SOLICITUDES
    $("#formSolicitudes").on("submit", function (e) {
        let codigo = $.trim($("#codigoSolicitud").val());
        let solicitante = $.trim($("#nombreSolicitante").val());
        let estado = $.trim($("#estadoSolicitud").val());
        let observaciones = $.trim($("#observacionesSolicitud").val());

        if (textoVacio(codigo) || textoVacio(solicitante) || textoVacio(estado) || textoVacio(observaciones)) {
            e.preventDefault();
            mostrarMensaje("mensajeSolicitudes", "Todos los campos de solicitudes son obligatorios.", "red");
            return;
        }

        if (observaciones.length < 8) {
            e.preventDefault();
            mostrarMensaje("mensajeSolicitudes", "Las observaciones deben tener al menos 8 caracteres.", "red");
            return;
        }

        mostrarMensaje("mensajeSolicitudes", "Formulario correcto.", "green");
    });

    // VALIDACION ADOPCIONES
    $("#formAdopciones").on("submit", function (e) {
        let codigo = $.trim($("#codigoAdopcion").val());
        let animal = $.trim($("#animalAdoptado").val());
        let adoptante = $.trim($("#adoptante").val());
        let fecha = $.trim($("#fechaSeguimiento").val());
        let estado = $.trim($("#estadoSeguimiento").val());
        let comentario = $.trim($("#comentarioSeguimiento").val());

        if (textoVacio(codigo) || textoVacio(animal) || textoVacio(adoptante) || textoVacio(fecha) || textoVacio(estado) || textoVacio(comentario)) {
            e.preventDefault();
            mostrarMensaje("mensajeAdopciones", "Todos los campos de adopciones son obligatorios.", "red");
            return;
        }

        if (comentario.length < 10) {
            e.preventDefault();
            mostrarMensaje("mensajeAdopciones", "El comentario debe tener al menos 10 caracteres.", "red");
            return;
        }

        mostrarMensaje("mensajeAdopciones", "Formulario correcto.", "green");
    });

    // VALIDACION DONACIONES
    $("#formDonaciones").on("submit", function (e) {
        let donante = $.trim($("#nombreDonante").val());
        let tipo = $.trim($("#tipoDonacion").val());
        let monto = $.trim($("#montoDonacion").val());
        let fecha = $.trim($("#fechaDonacion").val());
        let detalle = $.trim($("#detalleDonacion").val());

        if (textoVacio(donante) || textoVacio(tipo) || textoVacio(monto) || textoVacio(fecha) || textoVacio(detalle)) {
            e.preventDefault();
            mostrarMensaje("mensajeDonaciones", "Todos los campos de donaciones son obligatorios.", "red");
            return;
        }

        if (Number(monto) <= 0) {
            e.preventDefault();
            mostrarMensaje("mensajeDonaciones", "El monto o cantidad debe ser mayor a 0.", "red");
            return;
        }

        if (detalle.length < 5) {
            e.preventDefault();
            mostrarMensaje("mensajeDonaciones", "El detalle debe tener al menos 5 caracteres.", "red");
            return;
        }

        mostrarMensaje("mensajeDonaciones", "Formulario correcto.", "green");
    });

    // VALIDACION CONTENIDO
    $("#formContenido").on("submit", function (e) {
        let titulo = $.trim($("#tituloContenido").val());
        let tipo = $.trim($("#tipoContenido").val());
        let autor = $.trim($("#autorContenido").val());
        let fecha = $.trim($("#fechaContenido").val());
        let descripcion = $.trim($("#descripcionContenido").val());

        if (textoVacio(titulo) || textoVacio(tipo) || textoVacio(autor) || textoVacio(fecha) || textoVacio(descripcion)) {
            e.preventDefault();
            mostrarMensaje("mensajeContenido", "Todos los campos de contenido son obligatorios.", "red");
            return;
        }

        if (titulo.length < 5) {
            e.preventDefault();
            mostrarMensaje("mensajeContenido", "El título debe tener al menos 5 caracteres.", "red");
            return;
        }

        if (descripcion.length < 15) {
            e.preventDefault();
            mostrarMensaje("mensajeContenido", "La descripción debe tener al menos 15 caracteres.", "red");
            return;
        }

        mostrarMensaje("mensajeContenido", "Formulario correcto.", "green");
    });

    // VALIDACION REPORTES
    $("#formReportes").on("submit", function (e) {
        let tipo = $.trim($("#tipoReporte").val());
        let inicio = $.trim($("#fechaInicioReporte").val());
        let fin = $.trim($("#fechaFinReporte").val());

        if (textoVacio(tipo) || textoVacio(inicio) || textoVacio(fin)) {
            e.preventDefault();
            mostrarMensaje("mensajeReportes", "Todos los campos del reporte son obligatorios.", "red");
            return;
        }

        if (!validarFechaRango(inicio, fin)) {
            e.preventDefault();
            mostrarMensaje("mensajeReportes", "La fecha inicial no puede ser mayor que la fecha final.", "red");
            return;
        }

        mostrarMensaje("mensajeReportes", "Formulario correcto.", "green");
    });

});