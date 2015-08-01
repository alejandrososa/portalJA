<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paginas".
 *
 * @property integer $id_pag
 * @property string $titulo
 * @property string $contenido
 * @property integer $meta_id
 * @property integer $imagen_id
 * @property string $estado
 * @property integer $autor_id
 * @property string $slug
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_code_css
 * @property string $meta_code_js
 * @property integer $creado
 * @property integer $actualizado
 *
 * @property PaginasCategoria[] $paginasCategorias
 * @property Categorias[] $idCategorias
 */
class Paginas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paginas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contenido', 'creado', 'actualizado'], 'required'], //'titulo'
            [['meta_id', 'imagen_id', 'autor_id', 'creado', 'actualizado'], 'integer'],
            [['estado', 'meta_code_css', 'meta_code_js'], 'string'],
            [['titulo', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['contenido'], 'string', 'max' => 32],
            [['slug'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pag' => Yii::t('app', 'Id Pag'),
            'titulo' => Yii::t('app', 'Titulo'),
            'contenido' => Yii::t('app', 'Contenido'),
            'meta_id' => Yii::t('app', 'Meta ID'),
            'imagen_id' => Yii::t('app', 'Imagen ID'),
            'estado' => Yii::t('app', 'Estado'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'slug' => Yii::t('app', 'Slug'),
            'meta_keywords' => Yii::t('app', 'Meta Keywords'),
            'meta_description' => Yii::t('app', 'Meta Description'),
            'meta_code_css' => Yii::t('app', 'Meta Code Css'),
            'meta_code_js' => Yii::t('app', 'Meta Code Js'),
            'creado' => Yii::t('app', 'Creado'),
            'actualizado' => Yii::t('app', 'Actualizado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginasCategorias()
    {
        return $this->hasMany(PaginasCategoria::className(), ['id_pag' => 'id_pag']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategorias()
    {
        return $this->hasMany(Categorias::className(), ['id_categoria' => 'id_categoria'])->viaTable('paginas_categoria', ['id_pag' => 'id_pag']);
    }
}
