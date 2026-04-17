<?php $titulo = "Abraza | Historial de citas"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
     <section class="hero hero-interno">
        <div class="container hero-interno-contenido">

            <div class="hero-texto">
                <h2>Historial de citas</h2>

                <p>
                    Aquí puedes consultar las visitas que has realizado al refugio
                    para conocer animales disponibles para adopción.
                </p>

                <div class="hero-badges">
                    <span>Visitas al refugio</span>
                    <span>Citas registradas</span>
                    <span>Adopción responsable</span>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Historial de citas">
            </div>

        </div>
    </section>
     <section class="seccion">
        <div class="container">

            <h2 class="titulo-seccion">Citas realizadas</h2>

            <p class="subtitulo-seccion">
                Estas son las mascotas que visitaste durante tu proceso de adopción.
            </p>

            <div class="grid-mascotas grid-mascotas-amplio">

                <?php if (!empty($citas)): ?>
                    <?php foreach ($citas as $cita): ?>
                        <article class="tarjeta-mascota">
                            <div class="contenido-mascota">
                                <h3><?= htmlspecialchars($cita['motivo']); ?></h3>
                                <p>Fecha: <?= htmlspecialchars($cita['fecha']); ?></p>
                                <p>Hora: <?= htmlspecialchars($cita['hora']); ?></p>
                                <p class="descripcion-mascota">
                                    <?= htmlspecialchars($cita['comentarios']); ?>
                                </p>
                                <p class="estado-mascota">Cita registrada</p>

                                <a href="index.php?accion=estadoSolicitud" class="btn boton-secundario">
                                    Ver estado de solicitud
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No tienes citas registradas.</p>
                <?php endif; ?>
            </div>

        </div>
    </section>

</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>