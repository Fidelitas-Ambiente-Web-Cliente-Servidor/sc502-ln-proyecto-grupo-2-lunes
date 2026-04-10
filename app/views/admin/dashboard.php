<?php $titulo = "Abraza | Dashboard"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Panel administrativo</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5">Animales disponibles</h3>
                            <p class="display-6"><?= $totalAnimales; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5">Solicitudes pendientes</h3>
                            <p class="display-6"><?= $totalSolicitudes; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5">Donaciones recibidas</h3>
                            <p class="display-6">₡<?= number_format($totalDonaciones, 2); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>