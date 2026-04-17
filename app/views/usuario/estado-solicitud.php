<?php $titulo = "Abraza | Estado Solicitud"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container hero-interno-contenido">

            <div class="hero-texto">
                <h2>Estado de tu solicitud</h2>

                <p>
                    Aquí puedes consultar el estado actual de tu solicitud de adopción
                    y los próximos pasos del proceso.
                </p>

                <div class="hero-badges">
                    <span>Adopción responsable</span>
                    <span>Proceso de revisión</span>
                    <span>Bienestar animal</span>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Proceso adopción">
            </div>

        </div>
    </section>
    <section class="seccion fondo-suave">
        <div class="container">

            <h2 class="titulo-seccion">Detalle de la solicitud</h2>

            <p class="subtitulo-seccion">
                Consulta la información relacionada con tu solicitud de adopción.
            </p>

            <div class="tarjeta-info">

                <?php if (!empty($solicitud['imagen'])): ?>
                    <img src="img/<?= htmlspecialchars($solicitud['imagen']); ?>" class="imagenSolicitud" alt="Mascota solicitada">
                <?php else: ?>
                    <img src="img/perro1.jpeg" alt="Mascota solicitada" class="imagenSolicitud">
                <?php endif; ?>

                <h3>Mascota solicitada: <?= htmlspecialchars($solicitud['nombre_animal'] ?? 'Sin solicitud'); ?></h3>
                <p><strong>Contacto:</strong> <?= htmlspecialchars($solicitud['contacto'] ?? ''); ?></p>
                <p><strong>Estado actual:</strong> <?= htmlspecialchars($solicitud['estado'] ?? 'Pendiente'); ?></p>

                <div class="bloque-info-animal">
                    <h3>Proceso de adopción</h3>
                    <p>Solicitud enviada</p>
                    <p>En revisión por el refugio</p>
                    <p>Entrevista con adoptante</p>
                    <p>Aprobación final</p>
                </div>

                <br>

                <a href="index.php?accion=misSolicitudes" class="btn boton-secundario">
                    Volver a mis solicitudes
                </a>

            </div>

        </div>
    </section>
</main>

<script src="js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>