<?php $titulo = "Abraza | Admin Donaciones"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Registro de donaciones</h2>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Monto</th>
                            <th>Método</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($donaciones)): ?>
                            <?php foreach ($donaciones as $donacion): ?>
                                <tr>
                                    <td><?= $donacion['id']; ?></td>
                                    <td><?= htmlspecialchars($donacion['nombre']); ?></td>
                                    <td><?= htmlspecialchars($donacion['contacto']); ?></td>
                                    <td>₡<?= number_format($donacion['monto'], 2); ?></td>
                                    <td><?= htmlspecialchars($donacion['metodo']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay donaciones registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>