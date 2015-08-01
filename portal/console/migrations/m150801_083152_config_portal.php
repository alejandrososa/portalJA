<?php

use yii\db\Schema;
use yii\db\Migration;

class m150801_083152_config_portal extends Migration
{
public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        //SEO_URLS
        $this->createTable('{{%seo_urls}}', [
            'id_seo_url' => Schema::TYPE_PK,
            'titulo' => Schema::TYPE_STRING . ' NOT NULL',
            'slug' => Schema::TYPE_STRING . '(32) NOT NULL',
            'descripcion' => Schema::TYPE_STRING . '(255) NULL',
        
            //'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'creado' => Schema::TYPE_INTEGER . ' NOT NULL',
            'actualizado' => Schema::TYPE_INTEGER . ' NULL',
        ], $tableOptions);
        
        //MEDIA
        $this->createTable('{{%media}}', [
            'id_media' => Schema::TYPE_PK,
            'nombre' => Schema::TYPE_STRING . ' NOT NULL',
            'tipo_mime' => Schema::TYPE_STRING . '(32) NOT NULL',
            'seo_alt' => Schema::TYPE_STRING . ' NULL',
            'seo_titulo' => Schema::TYPE_STRING . ' NULL',
            'creado' => Schema::TYPE_INTEGER . ' NOT NULL',
            'actualizado' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        
        
        $this->createTable('{{%postmeta}}', [
            'id_postmeta' => Schema::TYPE_PK,
            //'post_id' => Schema::TYPE_STRING . ' NOT NULL',
            'meta_clave' => Schema::TYPE_STRING . '(100) NULL',
            'meta_valor' => Schema::TYPE_TEXT . ' NULL',
        ], $tableOptions);
        
        $this->createTable('{{%post_postmetas}}', [
            'id_post_postmetas' => Schema::TYPE_PK,
            //'post_id' => Schema::TYPE_STRING . ' NOT NULL',
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'meta_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        
        
        //POSTS
        $this->createTable('{{%paginas}}', [
            'id_pag' => Schema::TYPE_PK,
            'titulo' => Schema::TYPE_STRING . ' NOT NULL',
            'contenido' => Schema::TYPE_STRING . '(32) NOT NULL',
            'meta_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'imagen_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            ///'estado' => Schema::TYPE_STRING . '(32) NOT NULL DEFAULT "publicado"',
            'estado'          => "ENUM('publicado','pendiente') NOT NULL DEFAULT 'publicado'",
            //'categoria_id' => Schema::TYPE_INTEGER . ' DEFAULT 0',
            'autor_id' => Schema::TYPE_INTEGER . ' DEFAULT 1',
            //'slug_id' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'slug' => Schema::TYPE_STRING . '(100) NULL',
            'meta_keywords' => Schema::TYPE_STRING . ' NULL',
            'meta_description' => Schema::TYPE_STRING . ' NULL',
            'meta_code_css' => Schema::TYPE_TEXT . ' NULL',
            'meta_code_js' => Schema::TYPE_TEXT . ' NULL',
            'creado' => Schema::TYPE_INTEGER . ' NOT NULL',
            'actualizado' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        

        //CATEGORIAS
        $this->createTable('{{%categorias}}', [
            'id_categoria' => Schema::TYPE_PK,
            //'slug_id' => Schema::TYPE_INTEGER . ' NULL', //NOT NULL DEFAULT 0',
            'slug' => Schema::TYPE_STRING . '(100) NULL', //NOT NULL DEFAULT 0',
            'nombre' => Schema::TYPE_STRING . '(32) NOT NULL',
            'descripcion' => Schema::TYPE_TEXT,
            'padre' => Schema::TYPE_STRING . ' NOT NULL DEFAULT 0',
            'count' => Schema::TYPE_STRING . ' NOT NULL DEFAULT 0',
        ], $tableOptions);
        
        //POSTS
        $this->createTable('{{%paginas_categoria}}', [
            'id_pag' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'id_categoria' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'PRIMARY KEY (id_pag, id_categoria)',
        ], $tableOptions);

        $this->addForeignKey('fk_categoria_pagina', "{{%paginas_categoria}}", 'id_categoria', '{{%categorias}}', 'id_categoria', 'NO ACTION', 'NO ACTION');//, 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fk_pagina_categoria', "{{%paginas_categoria}}", 'id_pag', '{{%paginas}}', 'id_pag', 'NO ACTION', 'NO ACTION');//, 'CASCADE', 'NO ACTION');
       
        
        //MENU
        $this->createTable('{{%menu}}', [
            'id_menu' => Schema::TYPE_PK,
            'nombre' => Schema::TYPE_STRING . ' NOT NULL DEFAULT ""',
            'clase' => Schema::TYPE_STRING . ' NOT NULL DEFAULT ""',
            'enlace' => Schema::TYPE_STRING . ' NOT NULL DEFAULT "#"',
            'tipo_enlace' => " ENUM('interno','externo','_top') NOT NULL DEFAULT 'interno'",
            'target' => " ENUM('_self','_blank','_top') NOT NULL DEFAULT '_self'",
            'padre' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0'
        ], $tableOptions);
        
        //$this->addForeignKey('fk_post_postmeta', "{{%paginas}}", 'id_pag', '{{%postmeta}}', 'id_postmeta', 'CASCADE', 'RESTRICT');
        //$this->addForeignKey('fk_post_media', "{{%posts}}", 'id', '{{%media}}', 'id', 'CASCADE', 'NO ACTION');
        //$this->addForeignKey('fk_post_categoria', "{{%posts}}", 'id', '{{%categorias}}', 'id', 'CASCADE', 'NO ACTION');
        //$this->addForeignKey('fk_post_autor', "{{%posts}}", 'id', '{{%user}}', 'id', 'NO ACTION', 'NO ACTION');
        //$this->addForeignKey('fk_post_seourl', "{{%posts}}", 'id', '{{%seo_urls}}', 'id');//, 'CASCADE', 'NO ACTION');
        
        $this->insert('{{%categorias}}', [
            'id_categoria' => 1,
            'slug' => 'sin-categoria',
            'nombre' => 'Sin Categoría',
            'descripcion' => 'Categoría por defecto',
            'padre' => 0,
            'count' => 0,
        ]);

    }

    public function down()
    {
        $this->dropForeignKey('fk_pagina_categoria', '{{%paginas_categoria}}');
        $this->dropForeignKey('fk_categoria_pagina', '{{%paginas_categoria}}');
        $this->dropTable('{{%postmeta}}');
        $this->dropTable('{{%post_postmetas}}');
        $this->dropTable('{{%paginas}}');
        $this->dropTable('{{%categorias}}');
        $this->dropTable('{{%paginas_categoria}}');
        $this->dropTable('{{%media}}');
        $this->dropTable('{{%seo_urls}}'); 
        $this->dropTable('{{%menu}}');
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
    