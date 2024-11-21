-- Crear la base de datos llamada BarberiaDB
CREATE DATABASE BarberiaDB;

-- Usar la base de datos recién creada
USE BarberiaDB;

-- Tabla Usuarios para almacenar los datos de los usuarios
CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,        -- Identificador único para cada usuario
    nombre_usuario VARCHAR(50) NOT NULL,              -- Nombre del usuario
    email VARCHAR(100) UNIQUE NOT NULL,               -- Email único del usuario
    contraseña VARCHAR(255) NOT NULL,                 -- Contraseña almacenada en formato hash
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha en que el usuario fue creado
);

-- Tabla CortesDeCabello para almacenar los diferentes cortes de cabello disponibles
CREATE TABLE CortesDeCabello (
    id_corte INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único para cada corte
    nombre_corte VARCHAR(100) NOT NULL,               -- Nombre del corte de cabello
    descripcion TEXT,                                 -- Descripción del corte de cabello
    precio DECIMAL(10, 2) NOT NULL,                   -- Precio del corte
    duracion_estimada INT,                            -- Duración estimada del corte en minutos
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha en que se agregó el corte
);

-- Tabla ServiciosBarberia para almacenar los servicios adicionales que ofrece la barbería
CREATE TABLE ServiciosBarberia (
    id_servicio INT AUTO_INCREMENT PRIMARY KEY,       -- Identificador único para cada servicio
    nombre_servicio VARCHAR(100) NOT NULL,            -- Nombre del servicio
    descripcion TEXT,                                 -- Descripción del servicio
    precio DECIMAL(10, 2) NOT NULL,                   -- Precio del servicio
    duracion_estimada INT,                            -- Duración estimada del servicio en minutos
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha en que se agregó el servicio
);

-- Tabla Citas para registrar las citas que los usuarios agendan
CREATE TABLE Citas (
    id_cita INT AUTO_INCREMENT PRIMARY KEY,           -- Identificador único para cada cita
    id_usuario INT,                                   -- Referencia al usuario que agenda la cita
    id_corte INT NULL,                                -- Referencia al corte de cabello seleccionado (si aplica)
    id_servicio INT NULL,                             -- Referencia al servicio seleccionado (si aplica)
    fecha_cita DATETIME NOT NULL,                     -- Fecha y hora de la cita
    comentario TEXT,                                  -- Comentarios opcionales sobre la cita
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha en que se creó la cita
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario), -- Relación con la tabla de usuarios
    FOREIGN KEY (id_corte) REFERENCES CortesDeCabello(id_corte), -- Relación con la tabla de cortes de cabello
    FOREIGN KEY (id_servicio) REFERENCES ServiciosBarberia(id_servicio) -- Relación con la tabla de servicios
);

-- Tabla TemasBarberia para almacenar información general o temas relacionados con la barbería
CREATE TABLE TemasBarberia (
    id_tema INT AUTO_INCREMENT PRIMARY KEY,           -- Identificador único para cada tema
    titulo VARCHAR(100) NOT NULL,                     -- Título del tema
    contenido TEXT,                                   -- Contenido o descripción del tema
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha en que se creó el tema
);
