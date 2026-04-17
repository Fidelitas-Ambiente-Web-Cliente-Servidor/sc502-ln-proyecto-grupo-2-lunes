<?php $titulo = "Abraza | Inicio"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="hero">
        <div class="container hero-contenido">
            <div class="hero-texto">
                <h2>Adoptar también es dar una segunda oportunidad</h2>
                <p>
                    En Abraza queremos conectar personas responsables con animales rescatados
                    que necesitan un hogar lleno de amor, cuidado y compromiso.
                </p>

                <div class="hero-botones">
                    <a class="btn boton-principal" href="index.php?accion=animales">Ver animales</a>
                    <a class="btn boton-secundario" href="index.php?accion=login">Login</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/portada-abraza.jpeg" alt="Portada Abraza">
            </div>
        </div>
    </section>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">¿Cómo funciona?</h2>

            <div class="grid-pasos">
                <div class="tarjeta-paso">
                    <h3>1. Elegís</h3>
                    <p>Revisá los perfiles y buscá el animal ideal para tu hogar.</p>
                </div>

                <div class="tarjeta-paso">
                    <h3>2. Solicitá</h3>
                    <p>Completá el formulario de adopción con tus datos básicos.</p>
                </div>

                <div class="tarjeta-paso">
                    <h3>3. Coordiná</h3>
                    <p>Agendá una cita para conocer al animal y continuar el proceso.</p>
                </div>
            </div>
        </div>
    </section>
     <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Requisitos de adopción</h2>

            <div class="bloque-requisitos">
                <ul>
                    <li>Ser mayor de edad.</li>
                    <li>Presentar identificación.</li>
                    <li>Tener condiciones adecuadas para la mascota.</li>
                    <li>Comprometerse con alimentación y atención veterinaria.</li>
                    <li>Aceptar seguimiento del proceso de adopción.</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Contacto rápido</h2>
            <p class="subtitulo-seccion">
                Si querés más información, podés comunicarte con nosotros o visitar la página de contacto.
            </p>

            <div class="contacto-rapido">
                <div class="tarjeta-contacto">
                    <h3>Abraza</h3>
                    <p><strong>Ubicación:</strong> Zarcero, Costa Rica</p>
                    <p><strong>Correo:</strong> contacto@abraza.com</p>
                    <p><strong>Teléfono:</strong> 8888-8888</p>

                    <a href="index.php?accion=contacto" class="btn boton-principal">Ir a contacto</a>
                </div>

                <div class="tarjeta-contacto">
                    <h3>Ingreso al sistema</h3>
                    <a href="index.php?accion=login" class="btn boton-secundario">Ir al login</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>