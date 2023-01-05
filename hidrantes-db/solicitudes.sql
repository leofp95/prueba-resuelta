CREATE TABLE solicitudes(
    id SERIAL PRIMARY KEY,
    inspeccion int REFERENCES inspecciones(id),
    estado int DEFAULT 0, -- pendiente = 0, completa = 1
	  fecha_solicitud date not null,
    fecha_finalizacion date default null
);

DELIMITER //
CREATE PROCEDURE solicitudes_crear (in_inspeccion int, in_estado int) 
BEGIN
  INSERT INTO solicitudes(inspeccion, estado, fecha_solicitud)
  VALUES(in_inspeccion, in_estado, current_date);
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE solicitudes_eliminar (in_id int) 
BEGIN
  DELETE FROM solicitudes WHERE id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE solicitudes_obtener ()
BEGIN
  SELECT s.id, s.inspeccion, s.estado 
  FROM solicitudes s;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE solicitudes_obtener_id (in_id int)
BEGIN
  SELECT s.id, s.inspeccion, s.estado, s.fecha_solicitud, s.fecha_finalizacion
  FROM solicitudes s
  WHERE s.id = in_id;
END;
// DELIMITER ;

DELIMITER //
CREATE PROCEDURE solicitudes_modificar (in_id int, in_estado int) 
BEGIN
  IF in_estado > 0 THEN
    UPDATE solicitudes
    SET estado = in_estado, fecha_finalizacion = current_date
    WHERE id = in_id;
  END IF;
END;
// DELIMITER ;