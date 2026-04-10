<?php $titulo = "Abraza | Inicio"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero">
        <div class="container hero-contenido">
            <div class="hero-texto">
                <h2>Adoptar también es dar una segunda oportunidad</h2>
                <p>Conectamos personas responsables con animales rescatados que necesitan un hogar.</p>

                <div class="hero-botones">
                    <a class="btn boton-principal" href="index.php?accion=animales">Ver animales</a>
                    <a class="btn boton-secundario" href="index.php?accion=login">Login</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Portada Abraza">
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>