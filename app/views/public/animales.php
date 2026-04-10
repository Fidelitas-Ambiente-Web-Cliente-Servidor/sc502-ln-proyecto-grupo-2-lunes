<?php $titulo = "Abraza | Animales"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Animales en adopción</h2>

            <div class="row g-4">
                <?php foreach ($animales as $animal): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="img/<?= htmlspecialchars($animal['imagen']); ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['nombre']); ?>">
                            <div class="card-body">
                                <h3 class="h5"><?= htmlspecialchars($animal['nombre']); ?></h3>
                                <p><strong>Especie:</strong> <?= htmlspecialchars($animal['especie']); ?></p>
                                <p><strong>Edad:</strong> <?= htmlspecialchars($animal['edad']); ?></p>
                                <p><strong>Tamaño:</strong> <?= htmlspecialchars($animal['tamano']); ?></p>
                                <a href="index.php?accion=animal&id=<?= $animal['id']; ?>" class="btn boton-principal">Ver perfil</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>