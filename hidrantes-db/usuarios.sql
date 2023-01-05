create table usuarios(
	id SERIAL PRIMARY KEY,
	cedula int UNIQUE,
	nombre varchar(30),
	apellido_1 varchar(30),
	apellido_2 varchar(30),
	telefono int,
	tipo int,
	contrasena varchar(30)
);

DELIMITER //
CREATE PROCEDURE usuario_crear (in_cedula int, in_nombre varchar(30), in_apellido_1 varchar(30), in_apellido_2 varchar(30), in_telefono int, in_tipo int) 
BEGIN
  INSERT INTO usuarios(cedula, nombre, apellido_1, apellido_2, telefono, tipo)
  VALUES(in_cedula, in_nombre, in_apellido_1, in_apellido_2, in_telefono, in_tipo);
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuario_eliminar (in_cedula int) 
BEGIN
  DELETE FROM usuarios WHERE cedula = in_cedula;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuario_obtener ()
BEGIN
  SELECT u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono, u.tipo 
  FROM usuarios u;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuario_obtener_cedula (in_cedula int)
BEGIN
  SELECT u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono, u.tipo 
  FROM usuarios u
  WHERE u.cedula = in_cedula;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuario_obtener_id (in_id int)
BEGIN
  SELECT u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono, u.tipo 
  FROM usuarios u
  WHERE u.id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuario_modificar (in_cedula int, in_nombre varchar(30), in_apellido_1 varchar(30), in_apellido_2 varchar(30), in_telefono int, in_tipo int) 
BEGIN
  UPDATE usuarios
  SET nombre = in_nombre, apellido_1 = in_apellido_1, apellido_2 = in_apellido_2, telefono = in_telefono, tipo = in_tipo
  WHERE cedula = in_cedula;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE usuario_obtener_tipo (in_tipo int)
BEGIN
  SELECT u.id, u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono 
  FROM usuarios u
  WHERE u.tipo = in_tipo;
END;
// DELIMITER ;

-- Insertar Bomberos
INSERT INTO usuarios(cedula, nombre, apellido_1, apellido_2, telefono, tipo, contrasena)
VALUES
-- Admin
(111111110, 'Alejandro', 'Sanchez', 'Barboza', 11111111, 0, 'admin'),
-- Bomberos
(111111111, 'Juan', 'Perez', 'Lopez', 11111111, 1, ''),
(111111112, 'Carlos', 'Campos', 'Cerdas', 11111111, 1, ''),
(111111113, 'Pedro', 'Flores', 'Sanchez', 11111111, 1, ''),
(111111114, 'Maria', 'Chaves', 'Zamora', 11111111, 1, ''),
(111111115, 'Julieta', 'Gutierrez', 'Montero', 11111111, 1, ''),
-- Municipalidad
(111111116, 'Margarita', 'Lee', 'Torres', 11111111, 2, ''),
(111111117, 'Rosa', 'Baltodano', 'Cerdas', 11111111, 2, ''),
(111111118, 'Julian', 'Torres', 'Nice', 11111111, 2, '')

