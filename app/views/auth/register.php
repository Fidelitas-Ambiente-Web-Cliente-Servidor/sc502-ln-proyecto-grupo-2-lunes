<?php $titulo = "Abraza | Registro"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Crear cuenta</h2>
            <p class="subtitulo-seccion">Completa tus datos para registrarte.</p>

            <?php if (!empty($_SESSION['error_register'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error_register']; unset($_SESSION['error_register']); ?>
                </div>
            <?php endif; ?>

            <form action="index.php?accion=guardarRegistro" method="post">
                <input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre completo">
                <input type="text" name="usuario" class="form-control mb-3" placeholder="Nombre de usuario">
                <input type="email" name="correo" class="form-control mb-3" placeholder="Correo electrónico">
                <input type="password" name="clave" class="form-control mb-3" placeholder="Contraseña">
                <input type="text" name="telefono" class="form-control mb-3" placeholder="Teléfono">
                <input type="text" name="direccion" class="form-control mb-3" placeholder="Dirección">
                <input type="text" name="vivienda" class="form-control mb-3" placeholder="Tipo de vivienda">
                <textarea name="experiencia" class="form-control mb-3" placeholder="Experiencia con animales"></textarea>

                <button type="submit" class="btn boton-principal">Registrarme</button>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>