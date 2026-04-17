<?php $titulo = "Abraza | Donaciones"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container hero-interno-contenido">

            <div class="hero-texto">
                <h2>Apoyá nuestro refugio</h2>

                <p>
                    Las donaciones nos permiten seguir rescatando, alimentando y brindando atención
                    veterinaria a perros y gatos que necesitan una segunda oportunidad.
                </p>

                <div class="hero-badges">
                    <span>Bienestar animal</span>
                    <span>Rescate</span>
                    <span>Adopción responsable</span>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Donaciones para refugio">
            </div>

        </div>
    </section>

    <section class="seccion fondo-suave">
        <div class="container">

            <h2 class="titulo-seccion">¿En qué se utilizan las donaciones?</h2>

            <div class="grid-info">

                <div class="tarjeta-info">
                    <h3>Alimentación</h3>
                    <p>
                        Las donaciones ayudan a comprar alimento para los perros y gatos
                        rescatados mientras esperan una familia.
                    </p>
                </div>

                <div class="tarjeta-info">
                    <h3>Atención veterinaria</h3>
                    <p>
                        Muchos animales llegan con enfermedades o heridas y necesitan
                        tratamientos médicos y vacunas.
                    </p>
                </div>

                <div class="tarjeta-info">
                    <h3>Cuido y mantenimiento</h3>
                    <p>
                        El refugio necesita recursos para limpieza, mantenimiento
                        y cuidado diario de los animales.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section class="seccion">
        <div class="container">

            <h2 class="titulo-seccion">Métodos de donación</h2>

            <p class="subtitulo-seccion">
                Podés apoyar nuestro refugio a través de los siguientes medios.
            </p>

            <div class="grid-info">

                <div class="tarjeta-info">
                    <h3>Transferencia bancaria</h3>
                    <p>
                        Banco Nacional<br>
                        Cuenta: 123456789<br>
                        SINPE móvil: 8888-8888
                    </p>
                </div>

                <div class="tarjeta-info">
                    <h3>Donaciones de alimento o artículos</h3>
                    <p>
                        También podés donar alimento para perros y gatos,
                        medicinas, cobijas o artículos de limpieza.
                    </p>
                </div>

                <div class="tarjeta-info">
                    <h3>Apoyo directo</h3>
                    <p>
                        Podés coordinar una visita al refugio y realizar
                        tu donación directamente en nuestras instalaciones.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Donaciones</h2>
            <p class="subtitulo-seccion">Tu ayuda permite seguir rescatando animales.</p>

            <form action="index.php?accion=guardarDonacion" method="post" class="formulario-proyecto" id="formDonacion">
                <input type="text" id="nombreDonacion" name="nombre" class="form-control mb-3" placeholder="Nombre">
                <input type="text" id="contactoDonacion" name="contacto" class="form-control mb-3" placeholder="Correo o teléfono">
                <input type="number" step="0.01" id="montoDonacion" name="monto" class="form-control mb-3" placeholder="Monto o artículo">
                <select id="metodoDonacion" name="metodo" class="form-control mb-3">
                    <option value="">Seleccione método</option>
                    <option value="Sinpe">Sinpe</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
                <button type="submit" class="btn boton-principal">Registrar donación</button>
            </form>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>