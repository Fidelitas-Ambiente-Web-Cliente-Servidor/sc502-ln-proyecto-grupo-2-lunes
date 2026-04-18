
<?php $titulo = "Abraza | Animales"; ?>
<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/nav-publico.php'; ?>

<main>
    <section class="seccion">
        <div class="container">
            <h2 class="titulo-seccion">Animales en adopción</h2>
            <p class="subtitulo-seccion">
                Conoce algunas mascotas disponibles y filtrá por nombre, especie o tamaño.
            </p>

            <div class="bloque-filtros">
                <form id="formularioFiltros" class="formulario-filtros">
                    <div class="campo-filtro">
                        <label for="buscarNombre">Buscar por nombre</label>
                        <input type="text" id="buscarNombre" placeholder="Ej: Luna">
                    </div>

                    <div class="campo-filtro">
                        <label for="filtrarEspecie">Especie</label>
                        <select id="filtrarEspecie">
                            <option value="todos">Todas</option>
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                        </select>
                    </div>

                    <div class="campo-filtro">
                        <label for="filtrarTamano">Tamaño</label>
                        <select id="filtrarTamano">
                            <option value="todos">Todos</option>
                            <option value="Pequeño">Pequeño</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Grande">Grande</option>
                        </select>
                    </div>

                    <div class="campo-filtro campo-boton">
                        <button type="submit" class="btn boton-principal">Aplicar filtros</button>
                    </div>
                </form>

                <p id="mensajeFiltro" class="mensaje-filtro"></p>
            </div>

            <div class="row g-4">
                <?php foreach ($animales as $animal): ?>
                    <div class="col-md-4 mascota"
                         data-nombre="<?= htmlspecialchars($animal['nombre']); ?>"
                         data-especie="<?= $animal['especie']; ?>"
                         data-tamano="<?= $animal['tamano']; ?>">

                        <div class="card h-100 shadow-sm">
                            <img src="img/<?= htmlspecialchars($animal['imagen']); ?>" class="card-img-top" alt="<?= htmlspecialchars($animal['nombre']); ?>">
                            <div class="card-body">
                                <h3 class="h5"><?= htmlspecialchars($animal['nombre']); ?></h3>
                                <p><strong>Especie:</strong> <?= htmlspecialchars($animal['especie']); ?></p>
                                <p><strong>Edad:</strong> <?= htmlspecialchars($animal['edad']); ?></p>
                                <p><strong>Tamaño:</strong> <?= htmlspecialchars($animal['tamano']); ?></p>
                                <a href="index.php?accion=animal&id=<?= $animal['id']; ?>" class="btn boton-principal">Ver perfil</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<script src="/sc502-ln-proyecto-grupo-2-lunes/public/js/publico.js"></script>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
