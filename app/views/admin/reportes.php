<?php $titulo = "Abraza | Admin Reportes"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Generar reporte</h2>
            <p class="subtitulo-seccion">Selecciona un rango y tipo de reporte.</p>

            <form id="formReportes" class="row g-3">
                <div class="col-md-4">
                    <label for="tipoReporte" class="form-label">Tipo de reporte</label>
                    <select id="tipoReporte" class="form-select">
                        <option value="">Seleccione</option>
                        <option>Animales disponibles</option>
                        <option>Solicitudes pendientes</option>
                        <option>Adopciones realizadas</option>
                        <option>Donaciones recibidas</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="fechaInicioReporte" class="form-label">Fecha inicio</label>
                    <input type="date" id="fechaInicioReporte" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="fechaFinReporte" class="form-label">Fecha fin</label>
                    <input type="date" id="fechaFinReporte" class="form-control">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn boton-principal">Generar reporte</button>
                </div>

                <div class="col-12">
                    <p id="mensajeReportes" class="fw-bold"></p>
                </div>
            </form>
        </div>
    </section>

    <section class="seccion fondo-suave">
        <div class="container">
            <h2 class="titulo-seccion">Resumen</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5">Animales disponibles</h3>
                            <p class="display-6"><?= $totalAnimales ?? 0; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5">Solicitudes pendientes</h3>
                            <p class="display-6"><?= $totalSolicitudes ?? 0; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5">Donaciones</h3>
                            <p class="display-6">₡<?= number_format($totalDonaciones ?? 0, 2); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="js/admin.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>