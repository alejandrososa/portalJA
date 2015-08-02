<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id_menu
 * @property string $nombre
 * @property string $clase
 * @property string $enlace
 * @property string $tipo_enlace
 * @property string $target
 * @property integer $padre
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['tipo_enlace', 'target'], 'string'],
            //[['padre'], 'integer'],
            // 'enlace'
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => Yii::t('app', 'Id Menu'),
            'nombre' => Yii::t('app', 'Nombre'),
            'clase' => Yii::t('app', 'Clase'),
            'enlace' => Yii::t('app', 'Enlace'),
            'tipo_enlace' => Yii::t('app', 'Tipo Enlace'),
            'target' => Yii::t('app', 'Target'),
            'padre' => Yii::t('app', 'Padre'),
        ];
    }
    
    /**
     * Devuelve todos los enlaces
     * @return array enlaces
     */
    public static function getItems()
    {
        $items = [];
        $models = Menu::find()->all();
        foreach($models as $model) {
            $items[] = ['label' => $model->nombre, 'url' => $model->enlace];
        }
        return $items;
    }
    /**
     * Comprueba si enlace tiene hijos
     * @param int $id
     * @return bool
     */
    public static function tieneHijosItems($id){
        $resultado = false;
       
        if(!empty($id) && is_int($id)){
            $models = Menu::find()->all();
            foreach($models as $model) {
                $items[] = ['label' => $model->nombre, 'url' => $model->enlace];
            }
        }
        return $resultado;
    }
}
