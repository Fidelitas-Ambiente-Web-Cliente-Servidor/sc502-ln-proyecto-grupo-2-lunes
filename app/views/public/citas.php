<?php $titulo = "Abraza | Citas"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Citas</h2>
            <p class="subtitulo-seccion">Agendá una visita al refugio.</p>

            <form action="index.php?accion=guardarCita" method="post" class="formulario-proyecto" id="formCita">
                <input type="text" id="nombreCita" name="nombre" class="form-control mb-3" placeholder="Nombre">
                <input type="text" id="contactoCita" name="contacto" class="form-control mb-3" placeholder="Correo o teléfono">
                <input type="date" id="fechaCita" name="fecha" class="form-control mb-3">
                <input type="time" id="horaCita" name="hora" class="form-control mb-3">
                <input type="number" id="personasCita" name="personas" class="form-control mb-3" placeholder="Cantidad de personas">
                <input type="text" id="motivoCita" name="motivo" class="form-control mb-3" placeholder="Motivo">
                <textarea id="comentariosCita" name="comentarios" class="form-control mb-3" placeholder="Comentarios"></textarea>
                <button type="submit" class="btn boton-principal">Enviar cita</button>
            </form>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>