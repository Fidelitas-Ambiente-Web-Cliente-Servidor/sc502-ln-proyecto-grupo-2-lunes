<header class="header" id="inicio">
    <div class="container header-container">
        <div class="brand">
            <img src="img/logo.jpeg" alt="Logo Abraza" class="logo">
            <div class="texto-marca">
                <h1>Abraza</h1>
                <p>Refugio y adopción responsable</p>
            </div>
        </div>

        <nav class="menu-principal">
            <a href="index.php">Inicio</a>
            <a href="index.php?accion=sobre">Sobre el Refugio</a>
            <a href="index.php?accion=animales">Animales</a>
            <a href="index.php?accion=citas">Citas</a>
            <a href="index.php?accion=consejos">Consejos</a>
            <a href="index.php?accion=donaciones">Donaciones</a>
            <a href="index.php?accion=contacto">Contacto</a>

            <?php if (isset($_SESSION['usuario_id'])): ?>

                <a href="index.php?accion=perfil">Mi perfil</a>

                <a href="index.php?accion=logout" class="boton-login-menu">Salir</a>

            <?php else: ?>

                <a href="index.php?accion=login" class="boton-login-menu">Login</a>

            <?php endif; ?>
        </nav>
    </div>
</header>