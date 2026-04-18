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

    function invalidar(campo, mensaje) {
        if (!campo) return false;
        campo.setCustomValidity(mensaje);
        campo.reportValidity();
        campo.focus();
        return true;
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

    const year = document.getElementById("year");
    if (year) {
        year.textContent = new Date().getFullYear();
    }

    const formAnimal = document.querySelector('#formAnimales, form[action*="guardarAnimal"]');
    if (formAnimal) {
        limpiarValidezFormulario(formAnimal);

        formAnimal.addEventListener("submit", function (event) {
            const nombre = formAnimal.querySelector('#nombreAnimal, input[name="nombre"]');
            const especie = formAnimal.querySelector('#especieAnimal, input[name="especie"]');
            const edad = formAnimal.querySelector('#edadAnimal, input[name="edad"]');
            const tamano = formAnimal.querySelector('#tamanoAnimal, input[name="tamano"]');
            const estado = formAnimal.querySelector('#estadoAnimal, input[name="estado"], select[name="estado"]');
            const descripcion = formAnimal.querySelector('#descripcionAnimal, textarea[name="descripcion"]');

            if (valor(nombre) === "") {
                event.preventDefault();
                invalidar(nombre, "El nombre es obligatorio.");
                return;
            }

            if (valor(especie) === "") {
                event.preventDefault();
                invalidar(especie, "La especie es obligatoria.");
                return;
            }

            if (valor(edad) === "") {
                event.preventDefault();
                invalidar(edad, "La edad es obligatoria.");
                return;
            }

            if (Number(valor(edad)) < 0) {
                event.preventDefault();
                invalidar(edad, "La edad no puede ser negativa.");
                return;
            }

            if (valor(tamano) === "") {
                event.preventDefault();
                invalidar(tamano, "El tamaño es obligatorio.");
                return;
            }

            if (valor(estado) === "") {
                event.preventDefault();
                invalidar(estado, "El estado es obligatorio.");
                return;
            }

            if (valor(descripcion) === "") {
                event.preventDefault();
                invalidar(descripcion, "La descripción es obligatoria.");
                return;
            }

            if (valor(descripcion).length < 10) {
                event.preventDefault();
                invalidar(descripcion, "La descripción debe tener al menos 10 caracteres.");
            }
        });
    }

    const formReportes = document.querySelector("#formReportes");
    if (formReportes) {
        limpiarValidezFormulario(formReportes);

        const fechaInicio = formReportes.querySelector("#fechaInicioReporte");
        const fechaFin = formReportes.querySelector("#fechaFinReporte");

        if (fechaInicio) fechaInicio.setAttribute("max", hoyTexto());
        if (fechaFin) fechaFin.setAttribute("max", hoyTexto());

        formReportes.addEventListener("submit", function (event) {
            const tipo = formReportes.querySelector("#tipoReporte");
            const inicio = formReportes.querySelector("#fechaInicioReporte");
            const fin = formReportes.querySelector("#fechaFinReporte");

            if (valor(tipo) === "") {
                event.preventDefault();
                invalidar(tipo, "Debe seleccionar el tipo de reporte.");
                return;
            }

            if (valor(inicio) === "") {
                event.preventDefault();
                invalidar(inicio, "Debe indicar la fecha inicial.");
                return;
            }

            if (valor(fin) === "") {
                event.preventDefault();
                invalidar(fin, "Debe indicar la fecha final.");
                return;
            }

            if (valor(inicio) > valor(fin)) {
                event.preventDefault();
                invalidar(fin, "La fecha inicial no puede ser mayor que la fecha final.");
            }
        });
    }
});