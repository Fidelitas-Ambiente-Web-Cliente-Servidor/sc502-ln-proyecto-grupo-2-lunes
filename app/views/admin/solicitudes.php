<?php $titulo = "Abraza | Admin Solicitudes"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Gestión de solicitudes</h2>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Animal</th>
                            <th>Solicitante</th>
                            <th>Contacto</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitudes as $solicitud): ?>
                            <tr>
                                <td><?= $solicitud['id']; ?></td>
                                <td><?= htmlspecialchars($solicitud['nombre_animal']); ?></td>
                                <td><?= htmlspecialchars($solicitud['nombre']); ?></td>
                                <td><?= htmlspecialchars($solicitud['contacto']); ?></td>
                                <td><?= htmlspecialchars($solicitud['estado']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>