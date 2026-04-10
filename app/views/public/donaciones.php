<?php $titulo = "Abraza | Donaciones"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Donaciones</h2>
            <p class="subtitulo-seccion">Tu ayuda permite seguir rescatando animales.</p>

            <form action="index.php?accion=guardarDonacion" method="post" class="formulario-proyecto" id="formDonacion">
                <input type="text" id="nombreDonacion" name="nombre" class="form-control mb-3" placeholder="Nombre">
                <input type="text" id="contactoDonacion" name="contacto" class="form-control mb-3" placeholder="Correo o teléfono">
                <input type="number" step="0.01" id="montoDonacion" name="monto" class="form-control mb-3" placeholder="Monto o artículo">
                <select id="metodoDonacion" name="metodo" class="form-control mb-3">
                    <option value="">Seleccione método</option>
                    <option value="Sinpe">Sinpe</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
                <button type="submit" class="btn boton-principal">Registrar donación</button>
            </form>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>