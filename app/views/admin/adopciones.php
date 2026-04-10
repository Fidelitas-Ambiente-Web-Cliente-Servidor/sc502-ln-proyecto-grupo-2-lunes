<?php $titulo = "Abraza | Admin Adopciones"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Seguimiento de adopciones</h2>
            <p class="subtitulo-seccion">Consulta básica de procesos de adopción realizados.</p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Animal</th>
                            <th>Adoptante</th>
                            <th>Contacto</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($solicitudes)): ?>
                            <?php foreach ($solicitudes as $solicitud): ?>
                                <tr>
                                    <td><?= $solicitud['id']; ?></td>
                                    <td><?= htmlspecialchars($solicitud['nombre_animal']); ?></td>
                                    <td><?= htmlspecialchars($solicitud['nombre']); ?></td>
                                    <td><?= htmlspecialchars($solicitud['contacto']); ?></td>
                                    <td><?= htmlspecialchars($solicitud['estado']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay adopciones registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>