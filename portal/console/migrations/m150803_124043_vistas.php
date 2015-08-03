<?php

use yii\db\Schema;
use yii\db\Migration;

class m150803_124043_vistas extends Migration
{
    public function up()
    {
        /**
         * FUNCIONES
         */
        $this->execute("DROP FUNCTION IF EXISTS f_getMenuHijos;
                        CREATE FUNCTION f_getMenuHijos (GivenID INT) RETURNS varchar(1024) CHARSET latin1
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
                        END");
        
        $this->execute("DROP FUNCTION IF EXISTS f_getMenuJerarquia_by_padre;
                        CREATE FUNCTION f_getMenuJerarquia_by_padre (value INT) RETURNS int(11)
                            READS SQL DATA
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
                        		SELECT  MIN(id_menu) INTO @id
                        		FROM    menu
                        		WHERE   padre = _parent
                        		AND id_menu > _id;
                        
                        		IF @id IS NOT NULL OR _parent = @start_with THEN
                        			SET @level = @level + 1;
                        			RETURN @id;
                        		END IF;
                        
                        		SET @level := @level - 1;
                        		SELECT  id_menu, padre INTO    _id, _parent
                        		FROM    menu
                        		WHERE   id_menu = _parent;
                        	END LOOP;      
                        END");
        
        /**
         * VISTAS
         * @var unknown
         */
               
        $this->execute("DROP VIEW IF EXISTS v_getMenuDetallado;
                        CREATE VIEW v_getMenuDetallado AS
                        SELECT id_menu, nombre, clase, enlace, tipo_enlace, target, padre, f_getMenuHijos(id_menu) as hijos FROM menu;");
        
        /**
         * STORE PROCEDURES
         */
        $this->execute("DROP PROCEDURE IF EXISTS sp_getMenuJerarquia;
                        CREATE PROCEDURE sp_getMenuJerarquia()
                        BEGIN
                        	SELECT  CONCAT(REPEAT('', level - 1), CAST(mj.id_menu AS CHAR)) as id_menu, md.nombre, mj.padre, md.hijos,  mj.level as nivel
                        	FROM    (
                        			SELECT  id_menu, padre, IF(ancestry, @cl := @cl + 1, level + @cl) AS level
                        			FROM    (
                        					SELECT  TRUE AS ancestry, _id AS id_menu, padre, level
                        					FROM    (
                        							SELECT  @r AS _id,
                        									(SELECT  @r := padre
                        									FROM    menu
                        									WHERE   id_menu = _id
                        									) AS padre,
                        									@l := @l + 1 AS level
                        							FROM    (SELECT  @r := 0, @l := 0, @cl := 0) vars,
                        									menu h
                        							WHERE   @r <> 0
                        							ORDER BY level DESC
                        							) qi
                        					UNION ALL
                        					SELECT  FALSE, hi.id_menu, padre, level
                        					FROM    (
                        							SELECT  f_getMenuJerarquia_by_padre(id_menu) AS id_menu, @level AS level
                        							FROM    (SELECT  @start_with := 0, @id := @start_with, @level := 0) vars, menu
                        							WHERE   @id IS NOT NULL
                        							) ho
                        					JOIN    menu hi ON hi.id_menu = ho.id_menu
                        					) q
                        			) mj
                        			
                        			inner join v_getmenudetallado md on mj.id_menu = md.id_menu
                        			order by id_menu;
                        	   END;
                            ");
        
    }

    public function down()
    {
        //funciones
        $this->execute('DROP FUNCTION IF EXISTS f_getMenuHijos');
        $this->execute('DROP FUNCTION IF EXISTS f_getMenuJerarquia_by_padre');
        
        //vistas
        $this->execute('DROP VIEW IF EXISTS v_getMenuDetallado');
        
        //store procedure
        $this->execute('DROP PROCEDURE IF EXISTS sp_getMenuJerarquia;');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
