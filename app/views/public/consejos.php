<?php $titulo = "Abraza | Consejos"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container">
            <h2 class="titulo-seccion">Consejos para adoptantes</h2>
            <p>Adoptar una mascota implica responsabilidad, tiempo, paciencia y cariño.</p>

            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5">Tiempo de adaptación</h3>
                            <p>Dale a tu mascota tiempo para adaptarse a su nuevo hogar.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5">Visitas veterinarias</h3>
                            <p>Mantén sus vacunas y controles veterinarios al día.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5">Espacio y atención</h3>
                            <p>Procura un ambiente seguro, limpio y lleno de afecto.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>