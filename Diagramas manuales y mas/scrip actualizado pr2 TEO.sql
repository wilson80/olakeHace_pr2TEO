 
DROP DATABASE IF EXISTS bd_olake;

-- Script actualizado
CREATE DATABASE bd_olake;
USE bd_olake;

-- Tabla 'estado'
CREATE TABLE estado (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(100) NOT NULL
);
-- Tabla 'estadoReportes'
CREATE TABLE estadoReporte (
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
    currentAsistentes INT DEFAULT 0,
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
    id_publicacion INT,
    titulo VARCHAR(200),
    descripcion TEXT,
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id_publicacion),
    FOREIGN KEY (id_user) REFERENCES usuario(id_user)
);
  
-- Tabla 'reporte'
CREATE TABLE reporte (
    id_reporte INT AUTO_INCREMENT PRIMARY KEY,
    id_publicacion INT,
    id_motivo INT,
    id_estado INT DEFAULT 1,
    id_reportador INT,
    fecha_report DATETIME DEFAULT CURRENT_TIMESTAMP,
    -- estado_reporte INT DEFAULT 0,
    FOREIGN KEY (id_estado) REFERENCES estadoReporte(id_estado),
    FOREIGN KEY (id_reportador) REFERENCES usuario(id_user),
    FOREIGN KEY (id_publicacion) REFERENCES publicacion(id_publicacion),
    FOREIGN KEY (id_motivo) REFERENCES motivo(id_motivo)
);

-- 'reportes a publicadores'
CREATE TABLE reporte_pub (
    id_reporte INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_motivo INT,
    id_estado INT DEFAULT 1,
    id_reportador INT,
    fecha_report DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_estado) REFERENCES estadoReporte(id_estado),
    FOREIGN KEY (id_reportador) REFERENCES usuario(id_user),
    FOREIGN KEY (id_user) REFERENCES usuario(id_user),
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

 
 
CREATE  OR REPLACE VIEW vista_publicacion_completa AS
SELECT 
    p.id_publicacion,
    u.user AS username,
    p.titulo,
    p.lugar,
    p.fecha_hora,
    p.descripcion,
    p.cantidad_asistentes,
    p.currentAsistentes,
    e.nombre_estado AS estado,
    c.nombre_categoria AS categoria,
    t.descripcion_publico AS tipo_publico
FROM 
    publicacion p
JOIN 
    usuario u ON p.id_user = u.id_user
JOIN 
    estado e ON p.id_estado = e.id_estado
JOIN 
    categorias c ON p.id_cat = c.id_categoria
JOIN 
    tipo t ON p.id_tipo = t.id_tipo
WHERE 
    p.id_estado IN (2, 5);
 
 



 

DELIMITER //
-- filtra las publicaciones conforme su estado 
CREATE PROCEDURE vista_publicacion_completa_param(IN id_estado INT)
BEGIN
    SELECT 
        p.id_publicacion,
        u.user AS username,
        p.titulo,
        p.lugar,
        p.fecha_hora,
        p.descripcion,
        p.cantidad_asistentes,
        p.currentAsistentes,
        e.nombre_estado AS estado,
        c.nombre_categoria AS categoria,
        t.descripcion_publico AS tipo_publico
    FROM 
        publicacion p
    JOIN 
        usuario u ON p.id_user = u.id_user
    JOIN 
        estado e ON p.id_estado = e.id_estado
    JOIN 
        categorias c ON p.id_cat = c.id_categoria
    JOIN 
        tipo t ON p.id_tipo = t.id_tipo
    WHERE 
        p.id_estado = id_estado;
END //

DELIMITER ;


 


DELIMITER //
-- muestra toda la informacion de una publicacion incluyendo los dato del usuario que la creo y el tipo y categoria de esta.
CREATE PROCEDURE vista_una_publicacion(IN id_pub INT)
BEGIN
    SELECT 
        p.id_publicacion,
        u.user AS username,
        p.titulo,
        p.lugar,
        p.fecha_hora,
        p.descripcion,
        p.cantidad_asistentes,
        p.currentAsistentes,
        e.nombre_estado AS estado,
        c.nombre_categoria AS categoria,
        t.descripcion_publico AS tipo_publico
    FROM 
        publicacion p
    JOIN 
        usuario u ON p.id_user = u.id_user
    JOIN 
        estado e ON p.id_estado = e.id_estado
    JOIN 
        categorias c ON p.id_cat = c.id_categoria
    JOIN 
        tipo t ON p.id_tipo = t.id_tipo
    WHERE 
        p.id_publicacion = id_pub;
END //

DELIMITER ;






DELIMITER //
-- retorna el id del nuevo motivo insertado
CREATE PROCEDURE insertar_motivo(
    IN p_descripcion_motivo TEXT,
    OUT p_id_motivo INT
)
BEGIN
    -- Insertar el motivo en la tabla
    INSERT INTO motivo (descripcion_motivo)
    VALUES (p_descripcion_motivo);

    -- Obtener el id_motivo generado automáticamente
    SET p_id_motivo = LAST_INSERT_ID();
END //

DELIMITER ;

 
 









DELIMITER //
-- ISNERTAR AAAASSSSSSSISSS
CREATE OR REPLACE PROCEDURE insertarAsistencia(
    IN p_id_user INT, 
    IN p_id_publicacion INT
)
BEGIN
    DECLARE current_Asistentes INT;

    -- Insertar asistencia con la fecha actual
    INSERT INTO asistencia (id_usuario, id_publicacion, fecha_asistencia)
    VALUES (p_id_user, p_id_publicacion, NOW());

    -- Obtener la cantidad actual de asistentes
    SELECT currentAsistentes INTO current_Asistentes
    FROM publicacion
    WHERE id_publicacion = p_id_publicacion;

    -- Aumentar +1 la cantidad de asistentes de la publicación
    UPDATE publicacion
    SET currentAsistentes = current_Asistentes + 1
    WHERE id_publicacion = p_id_publicacion;

END //

DELIMITER ;





















DELIMITER //

CREATE TRIGGER after_insert_userPublicator
AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
    DECLARE id_rol INT; 

    -- configura los permisos del nuevo usuario
    IF NEW.id_rol = 2 THEN
       INSERT INTO gestion_permisos(id_user, aprobaciones, aprobAuto, bann) 
       VALUES (NEW.id_user, 0, 0, 0);

    END IF;
END //

DELIMITER ;


 
 



DELIMITER //
-- cuando se inserte un reporte notifica y verifica si es necesario ocultar la publicacion
CREATE OR REPLACE TRIGGER after_insert_reporte
AFTER INSERT ON reporte
FOR EACH ROW
BEGIN     
    DECLARE num_reportes INT DEFAULT 0;
    DECLARE idUser INT;
    DECLARE titulo_publicacion VARCHAR(250);
    -- Contar el número de reportes para la publicación dada


    -- SELECT COUNT(*) INTO num_reportes
    -- FROM reporte
    -- WHERE id_publicacion = NEW.id_publicacion AND id_estado = 1;    -- (1 significa sin revision)
    UPDATE publicacion
    SET id_estado = 5  -- estado del  id de 'reportada' en la tabla estados
    WHERE id_publicacion = NEW.id_publicacion;
    
    SELECT COUNT(*) INTO num_reportes
    FROM reporte
    WHERE id_publicacion = NEW.id_publicacion 
    AND id_estado != 2; -- Ignora los reportes con estado ignorado (id_estado = 2)



    -- Obteniendo el id del usuario publicador y el titulo de la publicacion
    SELECT id_user, titulo INTO idUser, titulo_publicacion
    FROM publicacion
    WHERE id_publicacion = NEW.id_publicacion;


    -- Si  cantidad de reportes es 3 o mas, cambiar el estado a 'oculto' id_estado=6 en la tabla reporte 
    IF num_reportes >= 3 THEN
        UPDATE publicacion
        SET id_estado = 6  -- estado del  id de 'oculto' en la tabla estados
        WHERE id_publicacion = NEW.id_publicacion;

            -- insertar notificacion para el usuario(avisar de que se oculto autom. su publicacion)
        INSERT INTO notificacion( id_user, titulo, descripcion, id_publicacion) 
        VALUES (idUser, 'Publicacion ocultada', 
        CONCAT('Tu publicacion: "', titulo_publicacion ,'" Ha sido ocultada automaticamente por haber recibido 3 reportes')
        , NEW.id_publicacion);

            -- insertar notificacion para el admin
        INSERT INTO notificacion( id_user, titulo, descripcion, id_publicacion) 
        VALUES (1, 'Publicacion ocultada', 
        CONCAT('Revisa la publicacion: "', titulo_publicacion, '" Ha sido reportada 3 veces por lo que se ha ocultado')
        , NEW.id_publicacion);

    END IF;
            -- insertar notificacion de cada reporte para el admin
 
        INSERT INTO notificacion( id_user, titulo, descripcion, id_publicacion) 
        VALUES (1, 'Publicacion Reportada', 
        CONCAT('Revisa la publicacion: ', titulo_publicacion)
        , NEW.id_publicacion);
        
            -- insertar notificacion de cada reporte para el usuario propietario de la publicacion
        INSERT INTO notificacion(id_user, titulo, descripcion, id_publicacion) 
        VALUES (idUser, 'Publicacion Reportada', 
        CONCAT('Tu publicacion ha recibido un reporte: ', titulo_publicacion)
        , NEW.id_publicacion);
    


END //

DELIMITER ;





DELIMITER //
-- para cuando un admin acepte o ignore un reporte
CREATE OR REPLACE TRIGGER activate_UpdateReporte
AFTER UPDATE ON reporte
FOR EACH ROW

BEGIN   
    DECLARE idUser INT;
    DECLARE aprob_Auto INT;
    
    SELECT id_user INTO idUser 
    FROM publicacion
    WHERE id_publicacion = NEW.id_publicacion;


    -- reporte ignorado 
    IF NEW.id_estado = 2 THEN
            -- regresar la publicacion oculta a la normalidad
            UPDATE publicacion
            set id_estado = 5       -- regresandola a la vista general
            WHERE id_publicacion = NEW.id_publicacion;
 
    END IF;


            -- notificar al user publicador
            -- reporte aceptado 
    IF NEW.id_estado = 3 THEN
        UPDATE publicacion
        SET id_estado = 6  -- estado del  id de 'oculto' en la tabla estados
        WHERE id_publicacion = NEW.id_publicacion;
            -- notificar al user publicador 
            -- notificar a los usuarios Asistentes
    
    END IF;
            


END //

DELIMITER ;
   







DELIMITER //
-- activa las aprobaciones automaticas
CREATE OR REPLACE PROCEDURE actualizar_activar_publicaciones(
    IN p_id_publicacion INT,
    IN p_id_estado INT
)
BEGIN
    DECLARE v_id_user INT;
    DECLARE v_aprobaciones INT;

    -- Obtener el id_user asociado a la publicación
    SELECT id_user INTO v_id_user
    FROM publicacion
    WHERE id_publicacion = p_id_publicacion;

    -- Verificar si el id_estado es 2
    IF p_id_estado = 2 THEN
                    -- actualizando la publicacion
                UPDATE publicacion
                SET id_estado = 2
                WHERE id_publicacion = p_id_publicacion;
                        -- NOTIFICAR APROBACION
                INSERT INTO notificacion(id_user, titulo, descripcion, id_publicacion) 
                VALUES (v_id_user, 'Publicacion Aceptada', 'Un admin ha Aceptado tu publicacion', p_id_publicacion);


        -- Obtener el número de aprobaciones del usuario en gestion_permisos
        SELECT aprobaciones INTO v_aprobaciones
        FROM gestion_permisos
        WHERE id_user = v_id_user;

        -- Si aprobaciones es <= 2, incrementar en 1
        IF v_aprobaciones <= 2 THEN
            UPDATE gestion_permisos
            SET aprobaciones = aprobaciones + 1
            WHERE id_user = v_id_user;

            IF v_aprobaciones + 1 = 2 THEN      -- activando las aprobaciones automaticas
                UPDATE gestion_permisos
                SET aprobAuto = 1
                WHERE id_user = v_id_user;
                -- notificar al user de las aprobaciones Automaticas
                INSERT INTO notificacion( id_user, titulo, descripcion, id_publicacion) 
                VALUES (v_id_user, 'Aprobaciones Automaticas ON','Se han activado las aprobaciones automaticas',p_id_publicacion);

            END IF;
        END IF;

    -- Si el id_estado es 4, actualizar el estado de la publicación a 4
    ELSEIF p_id_estado = 4 THEN
        UPDATE publicacion
        SET id_estado = 4
        WHERE id_publicacion = p_id_publicacion;
        -- notificar
        INSERT INTO notificacion(id_user, titulo, descripcion, id_publicacion) 
        VALUES (v_id_user, 'Publicacion Rechazada', 'Un admin ha rechazado tu publicacion', p_id_publicacion);


    END IF;

END //

DELIMITER ;









































--  -- verificar si es necesario el BANeo  de un User Publicador 
--             SELECT aprobAuto INTO aprob_Auto
--             FROM gestion_permisos
--             WHERE id_user = idUser;
            
--                 IF aprob_Auto = 0 THEN  -- bann
--                     UPDATE gestion_permisos     -- bann
--                     set bann = 1
--                     WHERE id_user = idUser;
--                     UPDATE gestion_permisos     -- aprobaciones
--                     set aprobaciones = 0
--                     WHERE id_user = idUser;
 

--                 END IF;
--                 IF aprob_Auto = 1 THEN  
--                     UPDATE gestion_permisos     
--                     set aprobaciones = 0            -- contador aprobaciones a 0
--                     WHERE id_user = idUser;
--                     UPDATE gestion_permisos         -- desabilitando las aproAuto.
--                     set aprobAuto = 0
--                     WHERE id_user = idUser;

--                 END IF;