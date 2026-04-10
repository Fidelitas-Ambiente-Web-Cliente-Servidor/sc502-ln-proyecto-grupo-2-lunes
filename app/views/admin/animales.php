<?php $titulo = "Abraza | Admin Animales"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-admin.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Gestión de animales</h2>

            <?php if (!empty($_SESSION['mensaje_admin'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['mensaje_admin']; unset($_SESSION['mensaje_admin']); ?>
                </div>
            <?php endif; ?>

            <form action="index.php?accion=guardarAnimal" method="post" class="mb-5">
                <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre">
                <input type="text" name="especie" class="form-control mb-3" placeholder="Especie">
                <input type="text" name="edad" class="form-control mb-3" placeholder="Edad">
                <input type="text" name="tamano" class="form-control mb-3" placeholder="Tamaño">
                <input type="text" name="estado" class="form-control mb-3" placeholder="Estado">
                <textarea name="descripcion" class="form-control mb-3" placeholder="Descripción"></textarea>
                <input type="text" name="imagen" class="form-control mb-3" placeholder="Nombre imagen, ej: perro1.jpeg">
                <button type="submit" class="btn boton-principal">Guardar animal</button>
            </form>

            <div class="row g-4">
                <?php foreach ($animales as $animal): ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="img/<?= htmlspecialchars($animal['imagen']); ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['nombre']); ?>">
                            <div class="card-body">
                                <h3 class="h5"><?= htmlspecialchars($animal['nombre']); ?></h3>
                                <p><?= htmlspecialchars($animal['especie']); ?></p>
                                <p><?= htmlspecialchars($animal['estado']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>