CREATE TABLE inspecciones(
    id SERIAL PRIMARY KEY,
    bombero int REFERENCES usuarios(id),
    hidrante int REFERENCES hidrantes(id),
    hidrante_nuevo varchar(30),
    completo bool DEFAULT false,
    accion int DEFAULT 0, -- Pendiente = 0, Instalacion = 1, Mantenimiento = 2, Ninguna = 3
    fecha_solicitud date not null,
    fecha_finalizacion date default null
);

DELIMITER //
CREATE PROCEDURE inspecciones_crear (in_bombero int, in_hidrante int) 
BEGIN
  INSERT INTO inspecciones(bombero, hidrante, fecha_solicitud)
  VALUES(in_bombero, in_hidrante, current_date);
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE inspecciones_crear_latlon (in_bombero int, in_hidrante_nuevo varchar(30), in_latitud float, in_longitud float) 
BEGIN
  INSERT INTO inspecciones(bombero, hidrante, hidrante_nuevo, fecha_solicitud)
  VALUES(in_bombero, 0, in_hidrante_nuevo, current_date);
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE inspecciones_eliminar (in_id int) 
BEGIN
  DELETE FROM inspecciones WHERE id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE inspecciones_obtener ()
BEGIN
  SELECT i.id, i.bombero, i.hidrante, i.completo, i.accion, i.fecha_solicitud, i.fecha_finalizacion 
  FROM inspecciones i;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE inspecciones_obtener_id (in_id int)
BEGIN
  RETURN QUERY
  SELECT i.id, i.bombero, i.hidrante, i.completo, i.accion, i.fecha_solicitud, i.fecha_finalizacion 
  FROM inspecciones i
  WHERE i.id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE inspecciones_modificar (in_id int, in_bombero int, in_hidrante int, in_accion int)
BEGIN
IF in_accion > 0 THEN
  UPDATE inspecciones
  SET bombero = in_bombero, hidrante = in_hidrante, accion = in_accion, completo = true, fecha_finalizacion = current_date 
  WHERE id = in_id;
ELSE
  UPDATE inspecciones
  SET bombero = in_bombero, hidrante = in_hidrante
  WHERE id = in_id;
END IF;
END;
// DELIMITER ;

