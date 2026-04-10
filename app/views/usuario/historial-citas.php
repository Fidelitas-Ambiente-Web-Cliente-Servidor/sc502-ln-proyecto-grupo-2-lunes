<?php $titulo = "Abraza | Estado de solicitud"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-usuario.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container">
            <h2 class="titulo-seccion">Estado de tu solicitud</h2>

            <div class="tarjeta-info mt-4">
                <h3><?= htmlspecialchars($solicitud['nombre_animal'] ?? 'Mascota'); ?></h3>
                <p><strong>Solicitante:</strong> <?= htmlspecialchars($solicitud['nombre'] ?? ''); ?></p>
                <p><strong>Contacto:</strong> <?= htmlspecialchars($solicitud['contacto'] ?? ''); ?></p>
                <p><strong>Estado:</strong> <?= htmlspecialchars($solicitud['estado'] ?? 'Pendiente'); ?></p>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>