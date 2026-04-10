<?php $titulo = "Abraza | Mi perfil"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-usuario.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Mi perfil</h2>

            <?php if (!empty($_SESSION['mensaje_perfil'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['mensaje_perfil']; unset($_SESSION['mensaje_perfil']); ?>
                </div>
            <?php endif; ?>

            <form action="index.php?accion=actualizarPerfil" method="post" class="formulario-proyecto">
                <input type="text" name="nombre" class="form-control mb-3" value="<?= htmlspecialchars($usuario['nombre'] ?? ''); ?>" placeholder="Nombre">
                <input type="text" name="correo" class="form-control mb-3" value="<?= htmlspecialchars($usuario['correo'] ?? ''); ?>" placeholder="Correo">
                <input type="text" name="telefono" class="form-control mb-3" value="<?= htmlspecialchars($usuario['telefono'] ?? ''); ?>" placeholder="Teléfono">
                <input type="text" name="direccion" class="form-control mb-3" value="<?= htmlspecialchars($usuario['direccion'] ?? ''); ?>" placeholder="Dirección">
                <input type="text" name="vivienda" class="form-control mb-3" value="<?= htmlspecialchars($usuario['vivienda'] ?? ''); ?>" placeholder="Vivienda">
                <input type="text" name="experiencia" class="form-control mb-3" value="<?= htmlspecialchars($usuario['experiencia'] ?? ''); ?>" placeholder="Experiencia">

                <button type="submit" class="btn boton-principal">Actualizar perfil</button>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>