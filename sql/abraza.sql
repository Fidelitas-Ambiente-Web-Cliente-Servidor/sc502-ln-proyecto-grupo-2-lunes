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
('Usuario Abraza', 'usuario@abraza.com', 'usuario', '1234', 'usuario', 'activo', '77777777', 'Alajuela', 'Apartamento', 'No');

INSERT INTO animales (nombre, especie, edad, tamano, estado, descripcion, imagen)
VALUES
('Luna', 'Perro', '4 meses', 'Mediano', 'Disponible para adopción', 'Cariñosa, sociable y con energía moderada.', 'perro1.jpeg'),
('Milo', 'Gato', '1 año', 'Pequeño', 'Disponible para adopción', 'Tranquilo y curioso. Se adapta bien a apartamentos.', 'gato1.jpeg'),
('Rocky', 'Perro', '4 años', 'Grande', 'Disponible para adopción', 'Leal y protector. Recomendado para casa con patio.', 'perro2.jpeg'),
('Nala', 'Gato', '2 años', 'Mediana', 'Disponible para adopción', 'Dulce, independiente y muy limpia.', 'gato2.jpeg');

INSERT INTO donaciones (nombre, contacto, monto, metodo)
VALUES
('Juan', '88887777', 15000.00, 'Sinpe'),
('María', 'maria@correo.com', 25000.00, 'Transferencia');