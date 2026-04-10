<?php $titulo = "Abraza | Perfil del animal"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container">
            <div class="perfil-animal">
                <div class="galeria-animal">
                    <img src="img/<?= htmlspecialchars($animal['imagen']); ?>" alt="<?= htmlspecialchars($animal['nombre']); ?>" class="imagen-principal-animal">
                </div>

                <div class="info-animal">
                    <h2><?= htmlspecialchars($animal['nombre']); ?></h2>
                    <p><strong>Especie:</strong> <?= htmlspecialchars($animal['especie']); ?></p>
                    <p><strong>Edad:</strong> <?= htmlspecialchars($animal['edad']); ?></p>
                    <p><strong>Tamaño:</strong> <?= htmlspecialchars($animal['tamano']); ?></p>
                    <p><strong>Estado:</strong> <?= htmlspecialchars($animal['estado']); ?></p>
                    <p><?= htmlspecialchars($animal['descripcion']); ?></p>

                    <div class="hero-botones">
                        <a href="index.php?accion=solicitudAdopcion&id=<?= $animal['id']; ?>" class="btn boton-principal">Quiero adoptar</a>
                        <a href="index.php?accion=animales" class="btn boton-secundario">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>