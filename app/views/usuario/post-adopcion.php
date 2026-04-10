<?php $titulo = "Abraza | Post adopción"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-usuario.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Seguimiento post adopción</h2>
            <p class="subtitulo-seccion">Comparte cómo se encuentra tu mascota.</p>

            <form class="formulario-proyecto">
                <input type="text" class="form-control mb-3" placeholder="Nombre de la mascota">
                <input type="date" class="form-control mb-3">
                <textarea class="form-control mb-3" placeholder="Comentario sobre la adaptación"></textarea>
                <button type="submit" class="btn boton-principal">Enviar seguimiento</button>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>