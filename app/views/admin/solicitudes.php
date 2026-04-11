<?php $titulo = "Abraza | Admin Solicitudes"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Gestión de solicitudes</h2>

            <?php if (!empty($_SESSION['mensaje_admin'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['mensaje_admin']; unset($_SESSION['mensaje_admin']); ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Animal</th>
                            <th>Solicitante</th>
                            <th>Contacto</th>
                            <th>Estado</th>
                            <th>Acciones</th>
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
                                    <td>
                                        <?php if ($solicitud['estado'] === 'Pendiente'): ?>

                                            <a href="index.php?accion=aprobarSolicitud&id=<?= $solicitud['id']; ?>" class="btn btn-success btn-sm">
                                                Aceptar
                                            </a>

                                            <a href="index.php?accion=denegarSolicitud&id=<?= $solicitud['id']; ?>" class="btn btn-danger btn-sm">
                                                Denegar
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">Sin acciones</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No hay solicitudes registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>