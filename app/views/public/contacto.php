<?php $titulo = "Abraza | Contacto"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container hero-interno-contenido">

            <div class="hero-texto">
                <h2>Contacto</h2>

                <p>
                    Si deseas más información sobre adopciones, visitas al refugio
                    o quieres colaborar con nosotros, puedes comunicarte a través
                    de los siguientes medios o enviarnos un mensaje.
                </p>

                <div class="hero-badges">
                    <span>Información</span>
                    <span>Adopciones</span>
                    <span>Colaboración</span>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Contacto refugio">
            </div>

        </div>
    </section>

    <section class="seccion fondo-suave">
        <div class="container">

            <h2 class="titulo-seccion">Información de contacto</h2>

            <div class="grid-info">

                <div class="tarjeta-info">
                    <h3>Ubicación</h3>
                    <p>Zarcero, Alajuela<br>Costa Rica</p>
                </div>

                <div class="tarjeta-info">
                    <h3>Correo</h3>
                    <p>abrazabienestaranimalzarcero@gmail.com</p>
                </div>

                <div class="tarjeta-info">
                    <h3>Teléfono</h3>
                    <p>8888-8888</p>
                </div>

            </div>

        </div>
    </section>

    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Contacto</h2>
            <p class="subtitulo-seccion">Escríbenos para consultas o apoyo.</p>

            <form id="formContacto" class="formulario-proyecto">
                <input type="text" id="nombreContacto" class="form-control mb-3" placeholder="Nombre">
                <input type="text" id="contactoMensaje" class="form-control mb-3" placeholder="Correo o teléfono">
                <textarea id="mensajeContacto" class="form-control mb-3" placeholder="Mensaje"></textarea>
                <button type="submit" class="btn boton-principal">Enviar mensaje</button>
            </form>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>