document.addEventListener("DOMContentLoaded", function () {

    let year = document.getElementById("year");

    if (year) {
        year.innerText = new Date().getFullYear();
    }

    function hoyFecha() {
        let hoy = new Date();
        let anio = hoy.getFullYear();
        let mes = hoy.getMonth() + 1;
        let dia = hoy.getDate();

        if (mes < 10) {
            mes = "0" + mes;
        }

        if (dia < 10) {
            dia = "0" + dia;
        }

        return anio + "-" + mes + "-" + dia;
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

    let formularioFiltros = document.getElementById("formularioFiltros");
    let buscarNombre = document.getElementById("buscarNombre");
    let filtrarEspecie = document.getElementById("filtrarEspecie");
    let filtrarTamano = document.getElementById("filtrarTamano");
    let mensajeFiltro = document.getElementById("mensajeFiltro");
    let mascotas = document.querySelectorAll(".mascota");

    if (formularioFiltros) {
        formularioFiltros.addEventListener("submit", function (event) {
            event.preventDefault();

            let nombreBuscado = buscarNombre.value.toLowerCase().trim();
            let especieSeleccionada = filtrarEspecie.value;
            let tamanoSeleccionado = filtrarTamano.value;
            let cantidadVisibles = 0;

            for (let i = 0; i < mascotas.length; i++) {
                let nombreMascota = mascotas[i].getAttribute("data-nombre");
                let especieMascota = mascotas[i].getAttribute("data-especie");
                let tamanoMascota = mascotas[i].getAttribute("data-tamano");

                let cumpleNombre = nombreMascota.indexOf(nombreBuscado) !== -1 || nombreBuscado === "";
                let cumpleEspecie = especieSeleccionada === "todos" || especieMascota === especieSeleccionada;
                let cumpleTamano = tamanoSeleccionado === "todos" || tamanoMascota === tamanoSeleccionado;

                if (cumpleNombre && cumpleEspecie && cumpleTamano) {
                    mascotas[i].style.display = "block";
                    cantidadVisibles++;
                } else {
                    mascotas[i].style.display = "none";
                }
            }

            if (cantidadVisibles > 0) {
                mensajeFiltro.style.color = "green";
                mensajeFiltro.innerText = "El filtro se aplico correctamente.";
            } else {
                mensajeFiltro.style.color = "red";
                mensajeFiltro.innerText = "No se encontraron mascotas con ese filtro.";
            }
        });
    }

    let datosAnimales = {
        luna: {
            nombre: "Luna",
            especie: "Perra",
            edad: "4 meses",
            tamano: "Mediana",
            estado: "Disponible para adopción",
            descripcion: "Cariñosa, sociable y con energía moderada.",
            detalle: "Ideal para paseos diarios y para personas que buscan una compañera amorosa y activa.",
            imagen1: "img/perro1.jpeg",
            imagen2: "img/luna1.jpeg",
            imagen3: "img/luna2.jpeg"
        },
        milo: {
            nombre: "Milo",
            especie: "Gato",
            edad: "1 año",
            tamano: "Pequeño",
            estado: "Disponible para adopción",
            descripcion: "Tranquilo y curioso. Se adapta bien a apartamentos.",
            detalle: "Perfecto para hogares tranquilos y personas que buscan un gato cariñoso e independiente.",
            imagen1: "img/gato1.jpeg",
            imagen2: "img/gato1.jpeg",
            imagen3: "img/gato1.jpeg"
        },
        rocky: {
            nombre: "Rocky",
            especie: "Perro",
            edad: "4 años",
            tamano: "Grande",
            estado: "Disponible para adopción",
            descripcion: "Leal y protector. Recomendado para casa con patio y rutina estable.",
            detalle: "Es un perro noble y atento, ideal para familias que tengan espacio y tiempo para él.",
            imagen1: "img/perro2.jpeg",
            imagen2: "img/perro2.jpeg",
            imagen3: "img/perro2.jpeg"
        },
        nala: {
            nombre: "Nala",
            especie: "Gata",
            edad: "2 años",
            tamano: "Mediana",
            estado: "Disponible para adopción",
            descripcion: "Dulce, independiente y muy limpia.",
            detalle: "Le gusta descansar cerca de las personas y adaptarse poco a poco a su nuevo hogar.",
            imagen1: "img/gato2.jpeg",
            imagen2: "img/gato2.jpeg",
            imagen3: "img/gato2.jpeg"
        },
        coco: {
            nombre: "Coco",
            especie: "Perro",
            edad: "1 año",
            tamano: "Pequeño",
            estado: "Disponible para adopción",
            descripcion: "Juguetón, amigable y muy alegre.",
            detalle: "Perfecto para familias que quieran una mascota activa, cercana y llena de energía.",
            imagen1: "img/perro3.jpeg",
            imagen2: "img/perro3.jpeg",
            imagen3: "img/perro3.jpeg"
        },
        bruno: {
            nombre: "Bruno",
            especie: "Perro",
            edad: "5 años",
            tamano: "Grande",
            estado: "Disponible para adopción",
            descripcion: "Noble, tranquilo y obediente.",
            detalle: "Disfruta caminatas, compañía humana y espacios abiertos donde pueda sentirse libre y seguro.",
            imagen1: "img/perro4.jpeg",
            imagen2: "img/perro4.jpeg",
            imagen3: "img/perro4.jpeg"
        },
        kira: {
            nombre: "Kira",
            especie: "Gata",
            edad: "7 meses",
            tamano: "Pequeña",
            estado: "Disponible para adopción",
            descripcion: "Curiosa, tierna y muy activa.",
            detalle: "Le encanta jugar, explorar y compartir tiempo con personas pacientes y cariñosas.",
            imagen1: "img/gato3.jpeg",
            imagen2: "img/gato3.jpeg",
            imagen3: "img/gato3.jpeg"
        },
        simon: {
            nombre: "Simón",
            especie: "Gato",
            edad: "3 años",
            tamano: "Grande",
            estado: "Disponible para adopción",
            descripcion: "Relajado, cariñoso y excelente compañía.",
            detalle: "Ideal para hogares tranquilos donde pueda descansar y recibir mucho cariño.",
            imagen1: "img/gato4.jpeg",
            imagen2: "img/gato4.jpeg",
            imagen3: "img/gato4.jpeg"
        },
        canela: {
            nombre: "Canela",
            especie: "Perra",
            edad: "2 años",
            tamano: "Mediana",
            estado: "Disponible para adopción",
            descripcion: "Amorosa, obediente y sociable.",
            detalle: "Convive bien con otras mascotas y disfruta mucho la atención y el acompañamiento.",
            imagen1: "img/perro5.jpeg",
            imagen2: "img/perro5.jpeg",
            imagen3: "img/perro5.jpeg"
        }
    };

    let nombreAnimal = document.getElementById("nombreAnimal");

    if (nombreAnimal) {
        let hash = window.location.hash.replace("#", "");
        let animal = datosAnimales[hash];

        if (!animal) {
            animal = datosAnimales["luna"];
        }

        document.getElementById("nombreAnimal").innerText = animal.nombre;
        document.getElementById("especieAnimal").innerText = animal.especie;
        document.getElementById("edadAnimal").innerText = animal.edad;
        document.getElementById("tamanoAnimal").innerText = animal.tamano;
        document.getElementById("estadoAnimal").innerText = animal.estado;
        document.getElementById("descripcionAnimal").innerText = animal.descripcion;
        document.getElementById("detalleAnimal").innerText = animal.detalle;

        let imagenPrincipal = document.getElementById("imagenPrincipalAnimal");
        let mini1 = document.getElementById("mini1");
        let mini2 = document.getElementById("mini2");

        imagenPrincipal.src = animal.imagen1;
        mini1.src = animal.imagen1;
        mini2.src = animal.imagen2;

        mini1.addEventListener("click", function () {
            imagenPrincipal.src = mini1.src;
        });

        mini2.addEventListener("click", function () {
            imagenPrincipal.src = mini2.src;
        });

    }
    let formAdopcion = document.getElementById("formAdopcion");

    if (formAdopcion) {
        let nombre = document.getElementById("nombreAdopcion");
        let contacto = document.getElementById("contactoAdopcion");
        let edad = document.getElementById("edadAdopcion");
        let direccion = document.getElementById("direccionAdopcion");
        let familia = document.getElementById("familiaAdopcion");
        let experiencia = document.getElementById("experienciaAdopcion");
        let vivienda = document.getElementById("tipoViviendaAdopcion");
        let motivo = document.getElementById("motivoAdopcion");

        let contenedor = document.querySelector(".formulario-proyecto");

        let mensajeError = document.createElement("div");
        mensajeError.className = "mensaje-formulario mensaje-error";

        let mensajeOk = document.createElement("div");
        mensajeOk.className = "mensaje-formulario mensaje-ok";

        contenedor.appendChild(mensajeError);
        contenedor.appendChild(mensajeOk);

        function limpiarMensajesAdopcion() {
            mensajeError.style.display = "none";
            mensajeError.innerHTML = "";
            mensajeOk.style.display = "none";
            mensajeOk.innerHTML = "";
        }

        formAdopcion.addEventListener("submit", function (event) {
            event.preventDefault();
            limpiarMensajesAdopcion();

            let errores = "";

            if (nombre.value == "") {
                errores += "<li>El nombre es obligatorio.</li>";
                nombre.style.borderColor = "red";
            } else {
                nombre.style.borderColor = "#cfdede";
            }

            if (contacto.value == "") {
                errores += "<li>El contacto es obligatorio.</li>";
                contacto.style.borderColor = "red";
            } else if (contactoValido(contacto.value) == false) {
                errores += "<li>El contacto debe ser un correo o un teléfono válido.</li>";
                contacto.style.borderColor = "red";
            } else {
                contacto.style.borderColor = "#cfdede";
            }

            if (edad.value == "" || edad.value < 18) {
                errores += "<li>Debe ser mayor de edad para enviar la solicitud.</li>";
                edad.style.borderColor = "red";
            } else {
                edad.style.borderColor = "#cfdede";
            }

            if (direccion.value == "") {
                errores += "<li>La dirección es obligatoria.</li>";
                direccion.style.borderColor = "red";
            } else {
                direccion.style.borderColor = "#cfdede";
            }

            if (familia.value == "") {
                errores += "<li>La descripción de la familia es obligatoria.</li>";
                familia.style.borderColor = "red";
            } else {
                familia.style.borderColor = "#cfdede";
            }

            if (experiencia.value == "") {
                errores += "<li>Debe indicar si ha tenido animales antes.</li>";
                experiencia.style.borderColor = "red";
            } else {
                experiencia.style.borderColor = "#cfdede";
            }

            if (vivienda.value == "") {
                errores += "<li>Debe seleccionar el tipo de vivienda.</li>";
                vivienda.style.borderColor = "red";
            } else {
                vivienda.style.borderColor = "#cfdede";
            }

            if (motivo.value == "") {
                errores += "<li>Debe indicar por qué desea adoptar.</li>";
                motivo.style.borderColor = "red";
            } else {
                motivo.style.borderColor = "#cfdede";
            }

            if (errores != "") {
                mensajeError.style.display = "block";
                mensajeError.innerHTML = "<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>";
                return;
            }

            mensajeOk.style.display = "block";
            mensajeOk.innerHTML =
                "<strong>Solicitud enviada</strong><br><br>" +
                "Nombre: " + nombre.value + "<br>" +
                "Contacto: " + contacto.value + "<br>" +
                "Edad: " + edad.value + "<br>" +
                "Residencia: " + direccion.value + "<br>" +
                "Experiencia con animales: " + experiencia.value + "<br>" +
                "Tipo de vivienda: " + vivienda.value;

            formAdopcion.reset();
        });
    }

    let formCita = document.getElementById("formCita");

    if (formCita) {
        let nombre = document.getElementById("nombreCita");
        let contacto = document.getElementById("contactoCita");
        let fecha = document.getElementById("fechaCita");
        let hora = document.getElementById("horaCita");
        let personas = document.getElementById("personasCita");
        let motivo = document.getElementById("motivoCita");
        let comentarios = document.getElementById("comentariosCita");

        let contenedor = document.querySelector(".formulario-proyecto");

        let mensajeError = document.createElement("div");
        mensajeError.className = "mensaje-formulario mensaje-error";

        let mensajeOk = document.createElement("div");
        mensajeOk.className = "mensaje-formulario mensaje-ok";

        contenedor.appendChild(mensajeError);
        contenedor.appendChild(mensajeOk);

        function limpiarMensajesCita() {
            mensajeError.style.display = "none";
            mensajeError.innerHTML = "";
            mensajeOk.style.display = "none";
            mensajeOk.innerHTML = "";
        }

        formCita.addEventListener("submit", function (event) {
            event.preventDefault();
            limpiarMensajesCita();

            let errores = "";

            if (nombre.value == "") {
                errores += "<li>El nombre es obligatorio.</li>";
                nombre.style.borderColor = "red";
            } else {
                nombre.style.borderColor = "#cfdede";
            }

            if (contacto.value == "") {
                errores += "<li>El contacto es obligatorio.</li>";
                contacto.style.borderColor = "red";
            } else if (contactoValido(contacto.value) == false) {
                errores += "<li>El contacto debe ser un correo o un teléfono válido.</li>";
                contacto.style.borderColor = "red";
            } else {
                contacto.style.borderColor = "#cfdede";
            }

            if (fecha.value == "") {
                errores += "<li>La fecha es obligatoria.</li>";
                fecha.style.borderColor = "red";
            } else if (fecha.value < hoyFecha()) {
                errores += "<li>La fecha no puede ser anterior a hoy.</li>";
                fecha.style.borderColor = "red";
            } else {
                fecha.style.borderColor = "#cfdede";
            }

            if (hora.value == "") {
                errores += "<li>La hora es obligatoria.</li>";
                hora.style.borderColor = "red";
            } else if (hora.value < "10:00" || hora.value > "18:00") {
                errores += "<li>La cita debe agendarse entre las 10:00 a. m. y las 6:00 p. m.</li>";
                hora.style.borderColor = "red";
            } else {
                hora.style.borderColor = "#cfdede";
            }

            if (personas.value == "" || personas.value <= 0) {
                errores += "<li>La cantidad de personas debe ser mayor a cero.</li>";
                personas.style.borderColor = "red";
            } else {
                personas.style.borderColor = "#cfdede";
            }

            if (motivo.value == "") {
                errores += "<li>Debe seleccionar el motivo de la visita.</li>";
                motivo.style.borderColor = "red";
            } else {
                motivo.style.borderColor = "#cfdede";
            }

            if (comentarios.value == "") {
                errores += "<li>Los comentarios no deben estar vacíos.</li>";
                comentarios.style.borderColor = "red";
            } else {
                comentarios.style.borderColor = "#cfdede";
            }

            if (errores != "") {
                mensajeError.style.display = "block";
                mensajeError.innerHTML = "<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>";
                return;
            }

            mensajeOk.style.display = "block";
            mensajeOk.innerHTML =
                "<strong>Cita enviada</strong><br><br>" +
                "Nombre: " + nombre.value + "<br>" +
                "Contacto: " + contacto.value + "<br>" +
                "Fecha: " + fecha.value + "<br>" +
                "Hora: " + hora.value + "<br>" +
                "Personas: " + personas.value + "<br>" +
                "Motivo: " + motivo.value;

            formCita.reset();
        });
    }
    let formDonacion = document.getElementById("formDonacion");

    if (formDonacion) {

        let nombre = document.getElementById("nombreDonacion");
        let contacto = document.getElementById("contactoDonacion");
        let monto = document.getElementById("montoDonacion");
        let metodo = document.getElementById("metodoDonacion");

        let contenedor = document.querySelector(".formulario-proyecto");

        let mensajeError = document.createElement("div");
        mensajeError.className = "mensaje-formulario mensaje-error";

        let mensajeOk = document.createElement("div");
        mensajeOk.className = "mensaje-formulario mensaje-ok";

        contenedor.appendChild(mensajeError);
        contenedor.appendChild(mensajeOk);

        function limpiarMensajesDonacion() {
            mensajeError.style.display = "none";
            mensajeOk.style.display = "none";
            mensajeError.innerHTML = "";
            mensajeOk.innerHTML = "";
        }

        formDonacion.addEventListener("submit", function (event) {

            event.preventDefault();
            limpiarMensajesDonacion();

            let errores = "";

            if (nombre.value == "") {
                errores += "<li>El nombre es obligatorio.</li>";
            }

            if (contacto.value == "") {
                errores += "<li>El contacto es obligatorio.</li>";
            }

            if (monto.value.trim() == "") {
                errores += "<li>Debe indicar el monto o la donación realizada.</li>";
            }

            if (metodo.value == "") {
                errores += "<li>Debe seleccionar el método de donación.</li>";
            }

            if (errores != "") {
                mensajeError.style.display = "block";
                mensajeError.innerHTML = "<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>";
                return;
            }

            mensajeOk.style.display = "block";
            mensajeOk.innerHTML =
                "<strong>Donación registrada</strong><br><br>" +
                "Nombre: " + nombre.value + "<br>" +
                "Contacto: " + contacto.value + "<br>" +
                "Monto o Articulo:" + monto.value + "<br>" +
                "Método: " + metodo.value;

            formDonacion.reset();

        });

    }
    let formContacto = document.getElementById("formContacto");

    if (formContacto) {

        let nombre = document.getElementById("nombreContacto");
        let contacto = document.getElementById("contactoMensaje");
        let mensaje = document.getElementById("mensajeContacto");

        let contenedor = document.querySelector(".formulario-proyecto");

        let mensajeError = document.createElement("div");
        mensajeError.className = "mensaje-formulario mensaje-error";

        let mensajeOk = document.createElement("div");
        mensajeOk.className = "mensaje-formulario mensaje-ok";

        contenedor.appendChild(mensajeError);
        contenedor.appendChild(mensajeOk);

        function limpiarMensajesContacto() {
            mensajeError.style.display = "none";
            mensajeOk.style.display = "none";
            mensajeError.innerHTML = "";
            mensajeOk.innerHTML = "";
        }

        formContacto.addEventListener("submit", function (event) {

            event.preventDefault();
            limpiarMensajesContacto();

            let errores = "";

            if (nombre.value == "") {
                errores += "<li>El nombre es obligatorio.</li>";
            }

            if (contacto.value == "") {
                errores += "<li>El contacto es obligatorio.</li>";
            }
            else if (contactoValido(contacto.value) == false) {
                errores += "<li>El contacto debe ser un correo o teléfono válido.</li>";
            }

            if (mensaje.value == "") {
                errores += "<li>El mensaje no puede estar vacío.</li>";
            }

            if (errores != "") {
                mensajeError.style.display = "block";
                mensajeError.innerHTML = "<strong>Revisa lo siguiente:</strong><ul>" + errores + "</ul>";
                return;
            }

            mensajeOk.style.display = "block";
            mensajeOk.innerHTML =
                "<strong>Mensaje enviado correctamente</strong><br><br>" +
                "Nombre: " + nombre.value + "<br>" +
                "Contacto: " + contacto.value;

            formContacto.reset();

        });

    }

});