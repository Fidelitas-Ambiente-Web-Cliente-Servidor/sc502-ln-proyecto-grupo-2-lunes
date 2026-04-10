<?php $titulo = "Abraza | Contacto"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
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

<script src="js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>