CREATE TABLE hidrantes(
    id SERIAL PRIMARY KEY,
    nombre varchar(30) NOT NULL,
    calle int,
    avenida int,
    caudal int,
    localizacion varchar(30)
);

DELIMITER //
CREATE PROCEDURE hidrantes_crear (in_nombre varchar(30), in_calle int, in_avenida int, in_caudal int, in_localizacion varchar(30)) 
BEGIN
  INSERT INTO hidrantes(nombre, calle, avenida, caudal, localizacion)
  VALUES(in_nombre, in_calle, in_avenida, in_caudal, in_localizacion);
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE hidrantes_eliminar (in_id int) 
BEGIN
  DELETE FROM hidrantes WHERE id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE hidrantes_obtener ()
BEGIN
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.localizacion
  FROM hidrantes h;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE hidrantes_obtener_id (in_id int)
BEGIN
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.localizacion
  FROM hidrantes h
  WHERE h.id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE hidrantes_obtener_nombre (in_nombre varchar(30))
BEGIN
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.localizacion
  FROM hidrantes h
  WHERE h.nombre LIKE CONCAT('%', in_nombre, '%');
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE hidrantes_modificar (in_id int, in_nombre varchar(30), in_calle int, in_avenida int, in_caudal int, in_localizacion varchar(30)) 
BEGIN
  UPDATE hidrantes
  SET nombre = in_nombre, calle = in_calle, avenida = in_avenida, caudal = in_caudal, localizacion=in_localizacion
  WHERE id = in_id;
END;

// DELIMITER ;

DELIMITER //
CREATE PROCEDURE hidrantes_modificar_latlon (in_id int, in_nombre varchar(30), in_calle int, in_avenida int, in_caudal int, in_latitud float, in_longitud float) 
BEGIN
  UPDATE hidrantes
  SET nombre = in_nombre, calle = in_calle, avenida = in_avenida, caudal = in_caudal, localizacion = CONCAT(in_latitud, ', ', in_longitud)
  WHERE id = in_id;
END;
// DELIMITER ;

INSERT INTO hidrantes(nombre, calle, avenida, caudal)
VALUES
('Parque', 1, 5, 25), 
('Museo', 4, 2, 25), 
('Taller', 8, 4, 25), 
('Galeria', 2, 8, 25), 
('Launch', 7, 2, 25), 
('Policia', 3, 9, 25), 
('Fuente', 9, 6, 25);