<?php $titulo = "Abraza | Post adopción"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container hero-interno-contenido">

            <div class="hero-texto">
                <h2>Seguimiento post adopción</h2>

                <p>
                    Adoptar una mascota es el inicio de una nueva historia.
                    Aquí puedes reportar cómo se encuentra tu mascota y recibir
                    consejos para su bienestar.
                </p>

                <div class="hero-badges">
                    <span>Bienestar animal</span>
                    <span>Cuidado responsable</span>
                    <span>Amor por los animales</span>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Post adopción">
            </div>

        </div>
    </section>

    <section class="seccion">
        <div class="container">

            <h2 class="titulo-seccion">Reporte de bienestar de tu mascota</h2>
            <p class="subtitulo-seccion">
                Comparte cómo se encuentra tu mascota después de la adopción.
                Esto nos ayuda a asegurar su bienestar.
            </p>

            <div class="tarjeta-info">
                <form class="formulario-proyecto">

                    <div class="mb-3">
                        <label class="form-label">Estado actual de la mascota</label>
                        <select class="form-control">
                            <option>Excelente</option>
                            <option>Bien</option>
                            <option>En adaptación</option>
                            <option>Necesita atención veterinaria</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comentarios del adoptante</label>
                        <textarea class="form-control" rows="4" placeholder="Cuéntanos cómo se ha adaptado tu mascota..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subir foto de tu mascota</label>
                        <input type="file" class="form-control">
                    </div>

                    <button type="submit" class="btn boton-principal">
                        Enviar reporte
                    </button>

                </form>
            </div>

        </div>
    </section>

    <section class="seccion fondo-suave">
        <div class="container">

            <h2 class="titulo-seccion">Historial de reportes</h2>

            <div class="tarjeta-info">
                <ul>
                    <li><strong>10/05/2026</strong> — La mascota se adaptó muy bien al hogar y ya juega con la familia.</li>
                    <li><strong>25/05/2026</strong> — Primera visita al veterinario completada. Vacunas al día.</li>
                    <li><strong>15/06/2026</strong> — La mascota está completamente adaptada y disfruta sus paseos diarios.</li>
                </ul>
            </div>

        </div>
    </section>

     <section class="seccion fondo-suave">
        <div class="container">

            <h2 class="titulo-seccion">Consejos para tu mascota</h2>

            <div class="grid-info">

                <div class="tarjeta-info">
                    <h3>Adaptación al hogar</h3>

                    <p>
                        Permite que tu mascota explore su nuevo hogar con calma.
                        Es normal que los primeros días esté nerviosa o tímida.
                    </p>

                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.youtube.com/embed/CRSt357yvTY?start=45"
                            title="Adaptación de mascotas"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="tarjeta-info">
                    <h3>Alimentación</h3>

                    <p>
                        Mantén horarios regulares de comida y utiliza alimento adecuado
                        para su edad y tamaño.
                    </p>

                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.youtube.com/embed/k4PzcyPYy0E"
                            title="Alimentación de mascotas"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="tarjeta-info">
                    <h3>Salud y veterinario</h3>

                    <p>
                        Realiza chequeos veterinarios periódicos y mantén las vacunas
                        de tu mascota al día.
                    </p>

                    <div class="ratio ratio-16x9">
                        <iframe
                            src="https://www.youtube.com/embed/TbgB5zH8_3E?si=ggGb8DEZzScHe4nA"
                            title="Salud y veterinario"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

            </div>

        </div>
    </section>


</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>