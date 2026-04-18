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

            <form id="formAdopcion" action="index.php?accion=guardarSolicitud" method="post" class="formulario-proyecto">
                <input type="hidden" name="animal_id" value="<?= htmlspecialchars($_GET['id'] ?? ''); ?>">

                <input type="text" id="nombreAdopcion" name="nombre" class="form-control mb-3" placeholder="Nombre completo">
                <input type="text" id="contactoAdopcion" name="contacto" class="form-control mb-3" placeholder="Correo o teléfono">
                <input type="number" id="edadAdopcion" name="edad" class="form-control mb-3" placeholder="Edad">
                <input type="text" id="direccionAdopcion" name="direccion" class="form-control mb-3" placeholder="Dirección">
                <textarea id="familiaAdopcion" name="familia" class="form-control mb-3" placeholder="Describa su familia"></textarea>
                <input type="text" id="experienciaAdopcion" name="experiencia" class="form-control mb-3" placeholder="Experiencia con animales">
                <input type="text" id="tipoViviendaAdopcion" name="vivienda" class="form-control mb-3" placeholder="Tipo de vivienda">
                <textarea id="motivoAdopcion" name="motivo" class="form-control mb-3" placeholder="Motivo para adoptar"></textarea>

                <button type="submit" class="btn boton-principal">Enviar solicitud</button>
            </form>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>