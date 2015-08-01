<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property integer $id_categoria
 * @property string $slug
 * @property string $nombre
 * @property string $descripcion
 * @property string $padre
 * @property string $count
 *
 * @property PaginasCategoria[] $paginasCategorias
 * @property Paginas[] $idPags
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['slug'], 'string', 'max' => 100],
            [['nombre'], 'string', 'max' => 32],
            [['padre', 'count'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => Yii::t('app', 'Id Categoria'),
            'slug' => Yii::t('app', 'Slug'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'padre' => Yii::t('app', 'Padre'),
            'count' => Yii::t('app', 'Count'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaginasCategorias()
    {
        return $this->hasMany(PaginasCategoria::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPags()
    {
        return $this->hasMany(Paginas::className(), ['id_pag' => 'id_pag'])->viaTable('paginas_categoria', ['id_categoria' => 'id_categoria']);
    }
}
