<?php $titulo = "Abraza | Login"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Iniciar sesión</h2>
            <p class="subtitulo-seccion">Ingresá tus datos para acceder al sistema.</p>

            <?php if (!empty($_SESSION['error_login'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error_login']; unset($_SESSION['error_login']); ?>
                </div>
            <?php endif; ?>

            <div class="login-contenedor">
                <div class="login-formulario">
                    <form action="index.php?accion=loginPost" method="post">
                        <div class="mb-3">
                            <label for="usuarioLogin" class="form-label">Usuario o correo</label>
                            <input type="text" class="form-control" id="usuarioLogin" name="usuario">
                        </div>

                        <div class="mb-3">
                            <label for="claveLogin" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="claveLogin" name="clave">
                        </div>

                        <button type="submit" class="btn boton-principal">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>