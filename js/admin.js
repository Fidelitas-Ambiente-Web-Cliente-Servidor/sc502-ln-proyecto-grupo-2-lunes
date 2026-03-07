document.addEventListener("DOMContentLoaded", function () {
    const yearSpan = document.getElementById("year");
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }

    function mostrarMensaje(idMensaje, texto, color) {
        const mensaje = document.getElementById(idMensaje);
        if (mensaje) {
            mensaje.textContent = texto;
            mensaje.style.color = color;
        }
    }

    function textoVacio(valor) {
        return valor.trim() === "";
    }

    function validarFechaRango(fechaInicio, fechaFin) {
        return new Date(fechaInicio) <= new Date(fechaFin);
    }

    // VALIDACION ANIMALES
    const formAnimales = document.getElementById("formAnimales");
    if (formAnimales) {
        formAnimales.addEventListener("submit", function (e) {
            e.preventDefault();

            const nombre = document.getElementById("nombreAnimal").value;
            const especie = document.getElementById("especieAnimal").value;
            const edad = document.getElementById("edadAnimal").value;
            const tamano = document.getElementById("tamanoAnimal").value;
            const estado = document.getElementById("estadoAnimal").value;
            const descripcion = document.getElementById("descripcionAnimal").value;

            if (textoVacio(nombre) || textoVacio(especie) || textoVacio(edad) || textoVacio(tamano) || textoVacio(estado) || textoVacio(descripcion)) {
                mostrarMensaje("mensajeAnimales", "Todos los campos del formulario de animales son obligatorios.", "red");
                return;
            }

            if (Number(edad) < 0) {
                mostrarMensaje("mensajeAnimales", "La edad no puede ser negativa.", "red");
                return;
            }

            if (descripcion.trim().length < 10) {
                mostrarMensaje("mensajeAnimales", "La descripción debe tener al menos 10 caracteres.", "red");
                return;
            }

            mostrarMensaje("mensajeAnimales", "Animal registrado correctamente.", "green");
            formAnimales.reset();
        });
    }

    // VALIDACION SOLICITUDES
    const formSolicitudes = document.getElementById("formSolicitudes");
    if (formSolicitudes) {
        formSolicitudes.addEventListener("submit", function (e) {
            e.preventDefault();

            const codigo = document.getElementById("codigoSolicitud").value;
            const solicitante = document.getElementById("nombreSolicitante").value;
            const estado = document.getElementById("estadoSolicitud").value;
            const observaciones = document.getElementById("observacionesSolicitud").value;

            if (textoVacio(codigo) || textoVacio(solicitante) || textoVacio(estado) || textoVacio(observaciones)) {
                mostrarMensaje("mensajeSolicitudes", "Todos los campos de solicitudes son obligatorios.", "red");
                return;
            }

            if (observaciones.trim().length < 8) {
                mostrarMensaje("mensajeSolicitudes", "Las observaciones deben tener al menos 8 caracteres.", "red");
                return;
            }

            mostrarMensaje("mensajeSolicitudes", "Solicitud actualizada correctamente.", "green");
            formSolicitudes.reset();
        });
    }

    // VALIDACION ADOPCIONES
    const formAdopciones = document.getElementById("formAdopciones");
    if (formAdopciones) {
        formAdopciones.addEventListener("submit", function (e) {
            e.preventDefault();

            const codigo = document.getElementById("codigoAdopcion").value;
            const animal = document.getElementById("animalAdoptado").value;
            const adoptante = document.getElementById("adoptante").value;
            const fecha = document.getElementById("fechaSeguimiento").value;
            const estado = document.getElementById("estadoSeguimiento").value;
            const comentario = document.getElementById("comentarioSeguimiento").value;

            if (textoVacio(codigo) || textoVacio(animal) || textoVacio(adoptante) || textoVacio(fecha) || textoVacio(estado) || textoVacio(comentario)) {
                mostrarMensaje("mensajeAdopciones", "Todos los campos de adopciones son obligatorios.", "red");
                return;
            }

            if (comentario.trim().length < 10) {
                mostrarMensaje("mensajeAdopciones", "El comentario debe tener al menos 10 caracteres.", "red");
                return;
            }

            mostrarMensaje("mensajeAdopciones", "Seguimiento registrado correctamente.", "green");
            formAdopciones.reset();
        });
    }

    // VALIDACION DONACIONES
    const formDonaciones = document.getElementById("formDonaciones");
    if (formDonaciones) {
        formDonaciones.addEventListener("submit", function (e) {
            e.preventDefault();

            const donante = document.getElementById("nombreDonante").value;
            const tipo = document.getElementById("tipoDonacion").value;
            const monto = document.getElementById("montoDonacion").value;
            const fecha = document.getElementById("fechaDonacion").value;
            const detalle = document.getElementById("detalleDonacion").value;

            if (textoVacio(donante) || textoVacio(tipo) || textoVacio(monto) || textoVacio(fecha) || textoVacio(detalle)) {
                mostrarMensaje("mensajeDonaciones", "Todos los campos de donaciones son obligatorios.", "red");
                return;
            }

            if (Number(monto) <= 0) {
                mostrarMensaje("mensajeDonaciones", "El monto o cantidad debe ser mayor a 0.", "red");
                return;
            }

            if (detalle.trim().length < 5) {
                mostrarMensaje("mensajeDonaciones", "El detalle debe tener al menos 5 caracteres.", "red");
                return;
            }

            mostrarMensaje("mensajeDonaciones", "Donación registrada correctamente.", "green");
            formDonaciones.reset();
        });
    }

    // VALIDACION CONTENIDO
    const formContenido = document.getElementById("formContenido");
    if (formContenido) {
        formContenido.addEventListener("submit", function (e) {
            e.preventDefault();

            const titulo = document.getElementById("tituloContenido").value;
            const tipo = document.getElementById("tipoContenido").value;
            const autor = document.getElementById("autorContenido").value;
            const fecha = document.getElementById("fechaContenido").value;
            const descripcion = document.getElementById("descripcionContenido").value;

            if (textoVacio(titulo) || textoVacio(tipo) || textoVacio(autor) || textoVacio(fecha) || textoVacio(descripcion)) {
                mostrarMensaje("mensajeContenido", "Todos los campos de contenido son obligatorios.", "red");
                return;
            }

            if (titulo.trim().length < 5) {
                mostrarMensaje("mensajeContenido", "El título debe tener al menos 5 caracteres.", "red");
                return;
            }

            if (descripcion.trim().length < 15) {
                mostrarMensaje("mensajeContenido", "La descripción debe tener al menos 15 caracteres.", "red");
                return;
            }

            mostrarMensaje("mensajeContenido", "Contenido guardado correctamente.", "green");
            formContenido.reset();
        });
    }

    // VALIDACION REPORTES
    const formReportes = document.getElementById("formReportes");
    if (formReportes) {
        formReportes.addEventListener("submit", function (e) {
            e.preventDefault();

            const tipo = document.getElementById("tipoReporte").value;
            const inicio = document.getElementById("fechaInicioReporte").value;
            const fin = document.getElementById("fechaFinReporte").value;

            if (textoVacio(tipo) || textoVacio(inicio) || textoVacio(fin)) {
                mostrarMensaje("mensajeReportes", "Todos los campos del reporte son obligatorios.", "red");
                return;
            }

            if (!validarFechaRango(inicio, fin)) {
                mostrarMensaje("mensajeReportes", "La fecha inicial no puede ser mayor que la fecha final.", "red");
                return;
            }

            mostrarMensaje("mensajeReportes", "Reporte generado correctamente.", "green");
        });
    }
});