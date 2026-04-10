<?php $titulo = "Abraza | Solicitud de adopción"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Solicitud de adopción</h2>

            <?php if (!empty($_SESSION['mensaje_publico'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['mensaje_publico']; unset($_SESSION['mensaje_publico']); ?>
                </div>
            <?php endif; ?>

            <form action="index.php?accion=guardarSolicitud" method="post" class="formulario-proyecto">
                <input type="hidden" name="animal_id" value="<?= htmlspecialchars($_GET['id'] ?? ''); ?>">

                <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre completo">
                <input type="text" name="contacto" class="form-control mb-3" placeholder="Correo o teléfono">
                <input type="number" name="edad" class="form-control mb-3" placeholder="Edad">
                <input type="text" name="direccion" class="form-control mb-3" placeholder="Dirección">
                <textarea name="familia" class="form-control mb-3" placeholder="Describa su familia"></textarea>
                <input type="text" name="experiencia" class="form-control mb-3" placeholder="Experiencia con animales">
                <input type="text" name="vivienda" class="form-control mb-3" placeholder="Tipo de vivienda">
                <textarea name="motivo" class="form-control mb-3" placeholder="Motivo para adoptar"></textarea>

                <button type="submit" class="btn boton-principal">Enviar solicitud</button>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>