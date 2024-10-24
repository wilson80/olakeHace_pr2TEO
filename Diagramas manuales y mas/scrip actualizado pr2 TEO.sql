DROP DATABASE IF EXISTS bd_olake;

-- Script actualizado
CREATE DATABASE bd_olake;
USE bd_olake;

-- Tabla 'estado'
CREATE TABLE estado (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(100) NOT NULL
);

-- Tabla 'categorias'
CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(100) NOT NULL
);

-- Tabla 'motivo'
CREATE TABLE motivo (
    id_motivo INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_motivo TEXT NOT NULL
);

-- Tabla 'rol'
CREATE TABLE rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(100) NOT NULL
);

-- Tabla 'info_usuario'
CREATE TABLE info_usuario (
    id_info INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    tel VARCHAR(20),
    gmail VARCHAR(100)
);

-- Tabla 'usuario'
CREATE TABLE usuario (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100) NOT NULL UNIQUE, 
    password VARCHAR(255) NOT NULL,
    id_rol INT,
    id_info INT,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol),
    FOREIGN KEY (id_info) REFERENCES info_usuario(id_info)
);

-- Tabla 'tipo'
CREATE TABLE tipo (
    id_tipo INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT,
    descripcion_publico TEXT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

-- Tabla 'publicacion'
CREATE TABLE publicacion (
    id_publicacion INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_estado INT,
    id_tipo INT,
    lugar VARCHAR(100),
    fecha_hora DATETIME,
    descripcion TEXT,
    cantidad_asistentes INT,
    FOREIGN KEY (id_user) REFERENCES usuario(id_user),
    FOREIGN KEY (id_estado) REFERENCES estado(id_estado),
    FOREIGN KEY (id_tipo) REFERENCES tipo(id_tipo)
);

-- Tabla 'asistencia'
CREATE TABLE asistencia (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_publicacion INT,
    fecha_asistencia DATETIME,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_user),
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id_publicacion)
);

-- Tabla 'notificacion'
CREATE TABLE notificacion (
    id_notificacion INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    titulo VARCHAR(200),
    descripcion TEXT,
    FOREIGN KEY (id_user) REFERENCES usuario(id_user)
);

-- Tabla 'reporte'
CREATE TABLE reporte (
    id_reporte INT AUTO_INCREMENT PRIMARY KEY,
    id_publicacion INT,
    id_motivo INT,
    fecha_report DATETIME,
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id_publicacion),
    FOREIGN KEY (id_motivo) REFERENCES motivo(id_motivo)
);

-- Tabla 'gestion_permisos'
CREATE TABLE gestion_permisos (
    id_user INT,
    aprobaciones INT DEFAULT 0,
    aprobAuto BOOLEAN DEFAULT FALSE,
    bann BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (id_user),
    FOREIGN KEY (id_user) REFERENCES usuario(id_user)
);




























DROP DATABASE IF EXISTS bd_olake;

-- Script actualizado
CREATE DATABASE bd_olake;
USE bd_olake;

-- Tabla 'estado'
CREATE TABLE estado (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(100) NOT NULL
);

-- Tabla 'categorias'
CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre_categoria VARCHAR(100) NOT NULL
);

-- Tabla 'motivo'
CREATE TABLE motivo (
    id_motivo INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_motivo TEXT NOT NULL
);

-- Tabla 'rol'
CREATE TABLE rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(100) NOT NULL
);

-- Tabla 'info_usuario'
CREATE TABLE info_usuario (
    id_info INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    tel VARCHAR(20),
    gmail VARCHAR(100)
);

-- Tabla 'usuario'
CREATE TABLE usuario (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100) NOT NULL UNIQUE, 
    password VARCHAR(255) NOT NULL,
    id_rol INT,
    id_info INT,
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol),
    FOREIGN KEY (id_info) REFERENCES info_usuario(id_info)
);

-- Tabla 'tipo'
CREATE TABLE tipo (
    id_tipo INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT,
    descripcion_publico TEXT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

-- Tabla 'publicacion'
CREATE TABLE publicacion (
    id_publicacion INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_estado INT,
    id_tipo INT,
    id_cat INT,
    titulo VARCHAR(255),  
    lugar VARCHAR(100),
    fecha_hora DATETIME,
    descripcion TEXT,
    cantidad_asistentes INT,
    FOREIGN KEY (id_user) REFERENCES usuario(id_user),
    FOREIGN KEY (id_estado) REFERENCES estado(id_estado),
    FOREIGN KEY (id_tipo) REFERENCES tipo(id_tipo),
    FOREIGN KEY (id_cat) REFERENCES categorias(id_categoria)
);

-- Tabla 'asistencia'
CREATE TABLE asistencia (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_publicacion INT,
    fecha_asistencia DATETIME,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_user),
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id_publicacion)
);

-- Tabla 'notificacion'
CREATE TABLE notificacion (
    id_notificacion INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    titulo VARCHAR(200),
    descripcion TEXT,
    FOREIGN KEY (id_user) REFERENCES usuario(id_user)
);

-- Tabla 'reporte'
CREATE TABLE reporte (
    id_reporte INT AUTO_INCREMENT PRIMARY KEY,
    id_publicacion INT,
    id_motivo INT,
    fecha_report DATETIME,
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id_publicacion),
    FOREIGN KEY (id_motivo) REFERENCES motivo(id_motivo)
);

-- Tabla 'gestion_permisos'
CREATE TABLE gestion_permisos (
    id_user INT,
    aprobaciones INT DEFAULT 0,
    aprobAuto BOOLEAN DEFAULT FALSE,
    bann BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (id_user),
    FOREIGN KEY (id_user) REFERENCES usuario(id_user)
);





