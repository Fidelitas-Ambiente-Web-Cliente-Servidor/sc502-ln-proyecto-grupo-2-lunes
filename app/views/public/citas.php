<?php $titulo = "Abraza | Citas"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Agendar cita</h2>
            <p class="subtitulo-seccion">Programa una visita para conocer el refugio o recibir orientación.</p>

            <?php if (!empty($_SESSION['mensaje_publico'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['mensaje_publico']; unset($_SESSION['mensaje_publico']); ?>
                </div>
            <?php endif; ?>

            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <div class="alert alert-warning">
                    Debes iniciar sesión para agendar una cita.
                </div>

                <a href="index.php?accion=login" class="btn boton-principal">
                    Iniciar sesión
                </a>
            <?php else: ?>
                <form action="index.php?accion=guardarCita" method="post" class="formulario-proyecto">
                    <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre completo" required>
                    <input type="text" name="contacto" class="form-control mb-3" placeholder="Correo o teléfono" required>
                    <input type="date" name="fecha" class="form-control mb-3" required>
                    <input type="time" name="hora" class="form-control mb-3" required>
                    <input type="number" name="personas" class="form-control mb-3" placeholder="Cantidad de personas" required>
                    <input type="text" name="motivo" class="form-control mb-3" placeholder="Motivo de la cita" required>
                    <textarea name="comentarios" class="form-control mb-3" placeholder="Comentarios adicionales" required></textarea>

                    <button type="submit" class="btn boton-principal">Agendar cita</button>
                </form>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>