-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Crear la tabla de departamentos
CREATE TABLE IF NOT EXISTS departamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Crear la tabla de personas
CREATE TABLE IF NOT EXISTS personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    departamento_id INT NOT NULL,
    FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
);

-- Crear la tabla de menu
CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    url VARCHAR(255) NOT NULL,
    icono VARCHAR(100) DEFAULT NULL,
    orden INT NOT NULL
);

-- Insertar datos en la tabla de usuarios
INSERT INTO usuarios (nombre, email, password) VALUES
('Admin', 'admin@example.com', '$2y$10$7sXwYKL2.SGV7aRm62PZBe21U9A8.k/0qEg/xS3Wxfy6W8wz3x9ua'), -- Contraseña: admin123
('Usuario', 'usuario@example.com', '$2y$10$a8FiUbvcd57.hllEBTnOxe.qjoL6t/XysRz4WE2tI62eZD8HGgVyK'); -- Contraseña: usuario123

-- Insertar datos en la tabla de departamentos
INSERT INTO departamentos (nombre) VALUES
('Recursos Humanos'),
('Finanzas'),
('IT'),
('Ventas');

-- Insertar datos en la tabla de personas
INSERT INTO personas (nombre, departamento_id) VALUES
('Juan Pérez', 1),
('Ana Gómez', 2),
('Carlos López', 3),
('María Rodríguez', 4);

-- Insertar datos en la tabla de menu
INSERT INTO menu (nombre, url, icono, orden) VALUES
('Inicio', '/pruebaTecnica/views/dashboard.php', NULL, 1),
('Personas', '/pruebaTecnica/views/personas/main.php', NULL, 2),
('Departamentos', '/pruebaTecnica/views/departamentos/main.php', NULL, 3);
