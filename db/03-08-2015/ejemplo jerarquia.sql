DELIMITER $$
DROP FUNCTION IF EXISTS `getPadreMenu` $$
CREATE FUNCTION `getPadreMenu` (GivenID INT) RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE rv INT;

    SELECT IFNULL(padre,-1) INTO rv FROM
    (SELECT padre FROM menu WHERE id_menu = GivenID) A;
    RETURN rv;
END $$
DELIMITER ;


DELIMITER $$
DROP FUNCTION IF EXISTS `getHijosMenu` $$
CREATE FUNCTION `getHijosMenu` (GivenID INT) RETURNS varchar(1024) CHARSET latin1
DETERMINISTIC
BEGIN

    DECLARE rv,q,queue,queue_children VARCHAR(1024);
    DECLARE queue_length,front_id,pos INT;

    SET rv = '';
    SET queue = GivenID;
    SET queue_length = 1;

    WHILE queue_length > 0 DO
        SET front_id = FORMAT(queue,0);
        IF queue_length = 1 THEN
            SET queue = '';
        ELSE
            SET pos = LOCATE(',',queue) + 1;
            SET q = SUBSTR(queue,pos);
            SET queue = q;
        END IF;
        SET queue_length = queue_length - 1;

        SELECT IFNULL(qc,'') INTO queue_children
        FROM (SELECT GROUP_CONCAT(id_menu) qc
        FROM menu WHERE padre = front_id) A;

        IF LENGTH(queue_children) = 0 THEN
            IF LENGTH(queue) = 0 THEN
                SET queue_length = 0;
            END IF;
        ELSE
            IF LENGTH(rv) = 0 THEN
                SET rv = queue_children;
            ELSE
                SET rv = CONCAT(rv,',',queue_children);
            END IF;
            IF LENGTH(queue) = 0 THEN
                SET queue = queue_children;
            ELSE
                SET queue = CONCAT(queue,',',queue_children);
            END IF;
            SET queue_length = LENGTH(queue) - LENGTH(REPLACE(queue,',','')) + 1;
        END IF;
    END WHILE;

    RETURN rv;

END $$




DROP TABLE IF EXISTS pctable;
CREATE TABLE pctable
(
    id INT NOT NULL AUTO_INCREMENT,
    parent_id INT,
    PRIMARY KEY (id)
) ENGINE=MyISAM;
INSERT INTO pctable (parent_id) VALUES (0);
INSERT INTO pctable (parent_id) SELECT parent_id+1 FROM pctable;
INSERT INTO pctable (parent_id) SELECT parent_id+2 FROM pctable;
INSERT INTO pctable (parent_id) SELECT parent_id+3 FROM pctable;
INSERT INTO pctable (parent_id) SELECT parent_id+4 FROM pctable;
INSERT INTO pctable (parent_id) SELECT parent_id+5 FROM pctable;
SELECT * FROM pctable;

select * from menu;
SELECT id_menu as id, nombre, padre as Padre, getHijosMenu(id_menu) as Hijos, count(getHijosMenu(id_menu)) as nivel FROM menu;





CREATE TABLE t_hierarchy (
id int(10) unsigned NOT NULL AUTO_INCREMENT,
parent int(10) unsigned NOT NULL,
PRIMARY KEY (id),
KEY ix_hierarchy_parent (parent, id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELIMITER $$
CREATE PROCEDURE prc_fill_hierarchy (level INT, fill INT)
BEGIN
DECLARE _level INT;
DECLARE _fill INT;

INSERT INTO    t_hierarchy (id, parent)
VALUES  (1, 0);
SET _fill = 0;
WHILE _fill < fill DO

INSERT INTO    t_hierarchy (parent)
VALUES  (1);
SET _fill = _fill + 1;
END WHILE;
SET _fill = 1;
SET _level = 0;
WHILE _level < level DO

INSERT INTO    t_hierarchy (parent)
SELECT  hn.id
FROM    t_hierarchy ho, t_hierarchy hn
WHERE   ho.parent = 1
AND hn.id > _fill;
SET _level = _level + 1;
SET _fill = _fill + POWER(fill, _level);
END WHILE;
END $$

DELIMITER ;
DROP FUNCTION IF EXISTS hierarchy_connect_by_parent_eq_prior_id;

DELIMITER $$

CREATE FUNCTION hierarchy_connect_by_parent_eq_prior_id(value INT) RETURNS INT NOT DETERMINISTIC READS SQL DATA
BEGIN
DECLARE _id INT;
DECLARE _parent INT;
DECLARE _next INT;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET @id = NULL;

SET _parent = @id;
SET _id = -1;

IF @id IS NULL THEN
RETURN NULL;
END IF;
 
LOOP
SELECT  MIN(id)
INTO    @id

FROM    t_hierarchy
WHERE   parent = _parent
AND id > _id;
IF @id IS NOT NULL OR _parent = @start_with THEN
SET @level = @level + 1;
RETURN @id;
END IF;
SET @level := @level - 1;
SELECT  id, parent
INTO    _id, _parent
FROM    t_hierarchy
WHERE   id = _parent;
END LOOP;      
END $$

DELIMITER ;
START TRANSACTION;
CALL prc_fill_hierarchy(6, 5);
COMMIT;





