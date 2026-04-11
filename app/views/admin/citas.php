<?php $titulo = "Abraza | Admin Citas"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Citas registradas</h2>
            <p class="subtitulo-seccion">Consulta de citas realizadas por los usuarios.</p>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Personas</th>
                            <th>Motivo</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($citas)): ?>
                            <?php foreach ($citas as $cita): ?>
                                <tr>
                                    <td><?= $cita['id']; ?></td>
                                    <td><?= htmlspecialchars($cita['nombre']); ?></td>
                                    <td><?= htmlspecialchars($cita['contacto']); ?></td>
                                    <td><?= htmlspecialchars($cita['fecha']); ?></td>
                                    <td><?= htmlspecialchars($cita['hora']); ?></td>
                                    <td><?= htmlspecialchars($cita['personas']); ?></td>
                                    <td><?= htmlspecialchars($cita['motivo']); ?></td>
                                    <td><?= htmlspecialchars($cita['comentarios']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No hay citas registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>