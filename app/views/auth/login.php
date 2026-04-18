<?php $titulo = "Abraza | Login"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Iniciar sesión</h2>
            <p class="subtitulo-seccion">Ingresá tus datos para acceder al sistema.</p>

            <?php if (!empty($_SESSION['mensaje_login'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['mensaje_login']; unset($_SESSION['mensaje_login']); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['error_login'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error_login']; unset($_SESSION['error_login']); ?>
                </div>
            <?php endif; ?>

            <div class="login-contenedor">
                <div class="login-formulario">
                    <form id="formLogin" action="index.php?accion=loginPost" method="post">
                        <div class="mb-3">
                            <label for="usuarioLogin" class="form-label">Usuario o correo</label>
                            <input type="text" class="form-control" id="usuarioLogin" name="usuario">
                        </div>

                        <div class="mb-3">
                            <label for="claveLogin" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="claveLogin" name="clave">
                        </div>

                        <p id="mensajeLogin" class="mt-2 fw-bold"></p>

                        <button type="submit" class="btn boton-principal">Ingresar</button>
                        <p class="mt-3">¿No tienes cuenta?</p>

                        <a href="index.php?accion=register" class="btn btn-success">
                            Registrarme
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/auth.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>