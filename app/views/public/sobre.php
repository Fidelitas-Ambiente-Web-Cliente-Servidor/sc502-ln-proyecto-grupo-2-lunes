<?php $titulo = "Abraza | Sobre el refugio"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container hero-interno-contenido">
            <div class="hero-texto">
                <h2>Sobre el Refugio Abraza</h2>
                <p>
                    Somos un refugio de animales ubicado en Zarcero, Costa Rica, dedicado al rescate,
                    cuido y adopción responsable de perros y gatos que necesitan una nueva oportunidad.
                </p>

                <div class="hero-botones">
                    <a href="index.php?accion=animales" class="btn boton-principal">Ver animales</a>
                    <a href="index.php?accion=contacto" class="btn boton-secundario">Contactarnos</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Abraza refugio de animales">
            </div>
        </div>
    </section>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Nuestra historia</h2>

            <div class="tarjeta-informativa">
                <p>
                    En Abraza creemos que cada animal merece vivir con amor, respeto y seguridad.
                    Por eso trabajamos para brindar refugio temporal a perros y gatos rescatados,
                    mientras encontramos para ellos una familia responsable y comprometida, dispuesta a dar amor.
                </p>

                <p>
                    Nuestro refugio nace con el deseo de ayudar a animales que han pasado por abandono,
                    maltrato o situaciones difíciles, dándoles atención, cuidado y una nueva posibilidad
                    de formar parte de un hogar.
                </p>
            </div>
        </div>
    </section>
    <section class="seccion fondo-suave">
        <div class="container">
            <h2 class="titulo-seccion">Nuestra misión</h2>

            <div class="tarjeta-destacada">
                <p>
                    Brindar una segunda oportunidad a perros y gatos rescatados, promoviendo la adopción
                    responsable y conectando cada animal con un hogar lleno de amor, cuidado y compromiso.
                </p>
            </div>
        </div>
    </section>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">¿Qué hacemos?</h2>

            <div class="grid-info">
                <div class="tarjeta-info">
                    <h3>Rescate y cuido</h3>
                    <p>
                        Recibimos animales que necesitan protección y les brindamos un espacio seguro
                        mientras se recuperan.
                    </p>
                </div>

                <div class="tarjeta-info">
                    <h3>Adopción responsable</h3>
                    <p>
                        Buscamos familias comprometidas que estén dispuestas a ofrecer tiempo, amor
                        y bienestar a cada mascota.
                    </p>
                </div>

                <div class="tarjeta-info">
                    <h3>Seguimiento</h3>
                    <p>
                        Acompañamos el proceso para asegurar que la adopción sea positiva tanto para
                        la mascota como para su nueva familia.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="seccion fondo-suave">
        <div class="container">
            <h2 class="titulo-seccion">Nuestros valores</h2>

            <div class="grid-valores">
                <div class="tarjeta-valor">
                    <h3>Amor</h3>
                    <p>Cuidamos cada vida con respeto, empatía y dedicación.</p>
                </div>

                <div class="tarjeta-valor">
                    <h3>Compromiso</h3>
                    <p>Promovemos hogares responsables y decisiones conscientes.</p>
                </div>

                <div class="tarjeta-valor">
                    <h3>Bienestar</h3>
                    <p>Buscamos siempre lo mejor para perros y gatos en todo el proceso.</p>
                </div>

                <div class="tarjeta-valor">
                    <h3>Esperanza</h3>
                    <p>Creemos en una nueva oportunidad para cada animal rescatado.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>