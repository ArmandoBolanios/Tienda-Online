DELIMITER //
CREATE TRIGGER resto_stock BEFORE INSERT ON detalle_venta
FOR EACH ROW 
BEGIN
DECLARE existencia_producto integer;
SELECT articulo.unidadesExistentes INTO existencia_producto FROM articulo
WHERE articulo.idArticulo = new.idArticulo;
IF existencia_producto > new.unidades THEN 
UPDATE articulo SET unidadesExistentes = unidadesExistentes - new.unidades WHERE articulo.idArticulo = new.idArticulo;
ELSE
SET new.idArticulo = null;
END IF;
END //
DELIMITER;

CREATE TRIGGER resto_stock BEFORE INSERT ON detalle_venta FOR EACH ROW BEGIN DECLARE existencia_producto integer; SELECT articulo.unidadesExistentes INTO existencia_producto FROM articulo WHERE articulo.idArticulo = new.idArticulo; IF existencia_producto > new.unidades THEN UPDATE articulo SET unidadesExistentes = unidadesExistentes - new.unidades WHERE articulo.idArticulo = new.idArticulo; ELSE SET new.idArticulo = null; END IF; END