CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(100) NOT NULL,
    rol ENUM('admin','usuario') NOT NULL,
    estado ENUM('activo','inactivo') DEFAULT 'activo',
    telefono VARCHAR(20) DEFAULT NULL,
    direccion VARCHAR(255) DEFAULT NULL,
    vivienda VARCHAR(100) DEFAULT NULL,
    experiencia VARCHAR(255) DEFAULT NULL
);

CREATE TABLE animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    edad VARCHAR(50) NOT NULL,
    tamano VARCHAR(50) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(100) DEFAULT NULL
);

CREATE TABLE solicitudes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NULL,
    animal_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    contacto VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    familia TEXT NOT NULL,
    experiencia TEXT NOT NULL,
    vivienda VARCHAR(100) NOT NULL,
    motivo TEXT NOT NULL,
    estado VARCHAR(50) DEFAULT 'Pendiente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (animal_id) REFERENCES animales(id)
);

CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NULL,
    nombre VARCHAR(100) NOT NULL,
    contacto VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    personas INT NOT NULL,
    motivo VARCHAR(100) NOT NULL,
    comentarios TEXT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE donaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contacto VARCHAR(100) NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    metodo VARCHAR(50) NOT NULL
);

INSERT INTO usuarios (nombre, correo, usuario, clave, rol, estado, telefono, direccion, vivienda, experiencia)
VALUES
('Administrador Abraza', 'admin@abraza.com', 'admin', '1234', 'admin', 'activo', '88888888', 'San José', 'Casa', 'Sí'),
('Usuario Abraza', 'usuario@abraza.com', 'usuario', '1234', 'usuario', 'activo', '77777777', 'Alajuela', 'Apartamento', 'No'),
('María González', 'maria@abraza.com', 'maria', '1234', 'usuario', 'activo', '70112233', 'Cartago', 'Casa', 'Sí'),
('Carlos Ramírez', 'carlos@abraza.com', 'carlos', '1234', 'usuario', 'activo', '71556677', 'Heredia', 'Casa con patio', 'Sí'),
('Fernanda Solís', 'fernanda@abraza.com', 'fernanda', '1234', 'usuario', 'activo', '88224466', 'Alajuela', 'Apartamento', 'No');

INSERT INTO animales (nombre, especie, edad, tamano, estado, descripcion, imagen)
VALUES
('Luna', 'Perro', '4 meses', 'Mediano', 'Disponible para adopción', 'Cariñosa, sociable y con energía moderada.', 'perro1.jpeg'),
('Milo', 'Gato', '1 año', 'Pequeño', 'Disponible para adopción', 'Tranquilo y curioso. Se adapta bien a apartamentos.', 'gato1.jpeg'),
('Rocky', 'Perro', '4 años', 'Grande', 'Disponible para adopción', 'Leal y protector. Recomendado para casa con patio.', 'perro2.jpeg'),
('Nala', 'Gato', '2 años', 'Mediana', 'Disponible para adopción', 'Dulce, independiente y muy limpia.', 'gato2.jpeg'),
('Max', 'Perro', '2 años', 'Grande', 'Disponible para adopción', 'Juguetón, obediente y muy activo.', 'perro3.jpeg'),
('Kiara', 'Gato', '8 meses', 'Pequeña', 'Disponible para adopción', 'Cariñosa y tranquila, ideal para interiores.', 'gato3.jpeg'),
('Toby', 'Perro', '3 años', 'Mediano', 'Disponible para adopción', 'Amigable con niños y muy sociable.', 'perro4.jpeg'),
('Mía', 'Gato', '5 meses', 'Pequeña', 'Disponible para adopción', 'Curiosa, tierna y muy juguetona.', 'gato4.jpeg'),
('Bruno', 'Perro', '5 años', 'Grande', 'Adoptado', 'Perro noble, protector y calmado.', 'perro5.jpeg'),
('Simba', 'Gato', '1 año', 'Mediano', 'Disponible para adopción', 'Activo, cariñoso y muy limpio.', 'gato5.jpeg');

INSERT INTO donaciones (nombre, contacto, monto, metodo)
VALUES
('Juan', '88887777', 15000.00, 'Sinpe'),
('María', 'maria@correo.com', 25000.00, 'Transferencia'),
('Carlos Ramírez', '71556677', 10000.00, 'Efectivo'),
('Fernanda Solís', 'fernanda@abraza.com', 18000.00, 'Sinpe'),
('Ana López', 'ana@gmail.com', 30000.00, 'Transferencia'),
('Luis Vargas', '85443322', 12000.00, 'Efectivo'),
('Sofía Morales', 'sofia@correo.com', 22000.00, 'Sinpe');

INSERT INTO solicitudes (usuario_id, animal_id, nombre, contacto, edad, direccion, familia, experiencia, vivienda, motivo, estado)
VALUES
(2, 1, 'Usuario Abraza', '77777777', 24, 'Alajuela centro', 'Vivo con mi familia y todos aman los animales.', 'He tenido perros antes.', 'Apartamento', 'Quiero darle un hogar responsable a Luna.', 'Pendiente'),
(3, 2, 'María González', '70112233', 29, 'Cartago', 'Vivo con mi esposo y una hija.', 'Sí, he tenido gatos antes.', 'Casa', 'Me gustaría adoptar a Milo porque se adapta a espacios pequeños.', 'Aprobada'),
(4, 3, 'Carlos Ramírez', '71556677', 35, 'Heredia', 'Vivo con mi esposa y dos hijos.', 'Sí, he cuidado perros durante años.', 'Casa con patio', 'Rocky tendría mucho espacio y compañía.', 'Pendiente'),
(5, 4, 'Fernanda Solís', '88224466', 27, 'Alajuela', 'Vivo sola pero trabajo desde casa.', 'Tuve un gato por 10 años.', 'Apartamento', 'Nala sería una excelente compañía.', 'Denegada'),
(2, 5, 'Usuario Abraza', '77777777', 24, 'Alajuela centro', 'Mi familia está emocionada por adoptar.', 'He tenido perros antes.', 'Apartamento', 'Max me parece muy noble y activo.', 'Pendiente'),
(3, 6, 'María González', '70112233', 29, 'Cartago', 'Mi hogar es tranquilo y seguro.', 'Sí, experiencia con gatos rescatados.', 'Casa', 'Quiero adoptar a Kiara y cuidarla responsablemente.', 'Pendiente'),
(4, 7, 'Carlos Ramírez', '71556677', 35, 'Heredia', 'Tenemos patio y mucho espacio.', 'Sí, experiencia con perros medianos.', 'Casa con patio', 'Toby encajaría muy bien con mi familia.', 'Aprobada');

INSERT INTO citas (usuario_id, nombre, contacto, fecha, hora, personas, motivo, comentarios)
VALUES
(2, 'Usuario Abraza', '77777777', '2026-04-20', '10:30:00', 2, 'Conocer a Luna', 'Queremos visitar el refugio y conocer a Luna.'),
(3, 'María González', '70112233', '2026-04-18', '11:00:00', 1, 'Visita para Milo', 'Me interesa conocer a Milo personalmente.'),
(4, 'Carlos Ramírez', '71556677', '2026-04-22', '14:00:00', 3, 'Visita para Rocky', 'Iré con mi familia para valorar la adopción.'),
(5, 'Fernanda Solís', '88224466', '2026-04-19', '09:30:00', 1, 'Consulta sobre Nala', 'Deseo recibir orientación antes de adoptar.'),
(2, 'Usuario Abraza', '77777777', '2026-04-25', '15:00:00', 2, 'Conocer a Max', 'Queremos saber si Max se adapta a apartamento.'),
(3, 'María González', '70112233', '2026-04-27', '13:30:00', 1, 'Visita para Kiara', 'Deseo conocer a Kiara y revisar el proceso.'),
(4, 'Carlos Ramírez', '71556677', '2026-04-28', '16:00:00', 4, 'Visita para Toby', 'Toda la familia quiere conocer a Toby.'),
(5, 'Fernanda Solís', '88224466', '2026-04-29', '10:00:00', 1, 'Información general', 'Quiero información sobre gatos disponibles.');