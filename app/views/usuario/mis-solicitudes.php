<?php $titulo = "Abraza | Mis solicitudes"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Mis solicitudes de adopción</h2>
            <p class="subtitulo-seccion">
                Aquí puedes ver el estado de tus solicitudes.
            </p>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Animal</th>                       
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($solicitudes)): ?>
                            <?php foreach ($solicitudes as $s): ?>
                                <tr>
                                    <td><?= htmlspecialchars($s['nombre_animal']); ?></td>

                                    <td>
                                        <?php if ($s['estado'] === 'Pendiente'): ?>
                                            <span class="badge bg-warning text-dark">Pendiente</span>
                                        <?php elseif ($s['estado'] === 'Aprobada'): ?>
                                            <span class="badge bg-success">Aprobada</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Denegada</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No tienes solicitudes registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
            <div style="margin-top: 20px;">
                <a href="index.php?accion=perfil" class="btn boton-secundario">
                    Volver a perfil
                </a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>