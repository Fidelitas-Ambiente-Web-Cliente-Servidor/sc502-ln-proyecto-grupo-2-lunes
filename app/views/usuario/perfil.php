<?php $titulo = "Abraza | Mi perfil"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero hero-interno">
        <div class="container hero-interno-contenido">
            <div class="hero-texto">
                <h2>Mi perfil</h2>
                <p>
                    En esta sección puedes visualizar y actualizar tu información básica
                    como adoptante registrado dentro del sistema Abraza.
                </p>

                <a href="index.php?accion=misSolicitudes" class="btn boton-secundario">Mis solicitudes</a>
                <a href="index.php?accion=postAdopcion" class="btn boton-secundario">Post-adopción</a>
                <a href="index.php?accion=estadoSolicitud" class="btn boton-secundario">Estado solicitud</a>
                <a href="index.php?accion=historialCitas" class="btn boton-secundario">Historial cita</a>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Perfil de usuario Abraza">
            </div>
        </div>
    </section>

    <section class="seccion fondo-suave">
        <div class="container">
            <h2 class="titulo-seccion">Información actual</h2>
            <p class="subtitulo-seccion">
                Estos son los datos actuales registrados del usuario.
            </p>

            <?php if (!empty($_SESSION['mensaje_perfil'])): ?>
                <div class="alert alert-info">
                    <?= $_SESSION['mensaje_perfil']; unset($_SESSION['mensaje_perfil']); ?>
                </div>
            <?php endif; ?>

            <div class="grid-info">
                <div class="tarjeta-info">
                    <h3>Nombre</h3>
                    <p><?= htmlspecialchars($usuario['nombre'] ?? ''); ?></p>
                </div>

                <div class="tarjeta-info">
                    <h3>Correo</h3>
                    <p><?= htmlspecialchars($usuario['correo'] ?? ''); ?></p>
                </div>

                <div class="tarjeta-info">
                    <h3>Teléfono</h3>
                    <p><?= htmlspecialchars($usuario['telefono'] ?? ''); ?></p>
                </div>
            </div>

            <div class="grid-info" style="margin-top: 25px;">
                <div class="tarjeta-info">
                    <h3>Dirección</h3>
                    <p><?= htmlspecialchars($usuario['direccion'] ?? ''); ?></p>
                </div>

                <div class="tarjeta-info">
                    <h3>Tipo de vivienda</h3>
                    <p><?= htmlspecialchars($usuario['vivienda'] ?? ''); ?></p>
                </div>

                <div class="tarjeta-info">
                    <h3>Experiencia con mascotas</h3>
                    <p><?= htmlspecialchars($usuario['experiencia'] ?? ''); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Actualizar perfil</h2>
            <p class="subtitulo-seccion">
                Completa los siguientes datos para actualizar tu perfil.
            </p>

            <div class="formulario-proyecto">
                <form id="formPerfil" action="index.php?accion=actualizarPerfil" method="post">
                    <div class="mb-3">
                        <label for="nombrePerfil" class="form-label">Nombre completo</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nombrePerfil"
                            name="nombre"
                            value="<?= htmlspecialchars($usuario['nombre'] ?? ''); ?>"
                            placeholder="Digite su nombre completo">
                    </div>

                    <div class="mb-3">
                        <label for="correoPerfil" class="form-label">Correo electrónico</label>
                        <input
                            type="email"
                            class="form-control"
                            id="correoPerfil"
                            name="correo"
                            value="<?= htmlspecialchars($usuario['correo'] ?? ''); ?>"
                            placeholder="Digite su correo">
                    </div>

                    <div class="mb-3">
                        <label for="telefonoPerfil" class="form-label">Teléfono</label>
                        <input
                            type="text"
                            class="form-control"
                            id="telefonoPerfil"
                            name="telefono"
                            value="<?= htmlspecialchars($usuario['telefono'] ?? ''); ?>"
                            placeholder="Digite su teléfono">
                    </div>

                    <div class="mb-3">
                        <label for="direccionPerfil" class="form-label">Dirección</label>
                        <input
                            type="text"
                            class="form-control"
                            id="direccionPerfil"
                            name="direccion"
                            value="<?= htmlspecialchars($usuario['direccion'] ?? ''); ?>"
                            placeholder="Digite su dirección">
                    </div>

                    <div class="mb-3">
                        <label for="viviendaPerfil" class="form-label">Tipo de vivienda</label>
                        <select class="form-control" id="viviendaPerfil" name="vivienda">
                            <option value="">Seleccione una opción</option>
                            <option value="Casa" <?= (($usuario['vivienda'] ?? '') === 'Casa') ? 'selected' : ''; ?>>Casa</option>
                            <option value="Apartamento" <?= (($usuario['vivienda'] ?? '') === 'Apartamento') ? 'selected' : ''; ?>>Apartamento</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="experienciaPerfil" class="form-label">¿Ha tenido mascotas antes?</label>
                        <select class="form-control" id="experienciaPerfil" name="experiencia">
                            <option value="">Seleccione una opción</option>
                            <option value="Sí" <?= (($usuario['experiencia'] ?? '') === 'Sí') ? 'selected' : ''; ?>>Sí</option>
                            <option value="No" <?= (($usuario['experiencia'] ?? '') === 'No') ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>

                    <input type="submit" value="Guardar cambios" class="btn boton-principal">
                </form>
            </div>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/usuario.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>