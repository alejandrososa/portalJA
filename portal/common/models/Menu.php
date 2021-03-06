<?php

namespace common\models;

use Yii;
use yii\db\Query;


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
     * METODOS PRIVADOS
     */
    public function getMenuDetallado($where = null) {
        $menu = array();
        $sql = 'SELECT * FROM v_getmenudetallado';
        
        if(!empty($where)){
            $sql .= ' where id_menu ='.$where;
        }
    
        $cnx = Yii::$app->db;
        $menu = $cnx->createCommand($sql)->queryAll();    
        return $menu;
    }
    
    public function getMenuJerarquia() {
        $menu = array();
        $sql = 'call sp_getMenuJerarquia();';
        $cnx = Yii::$app->db;
        $menu = $cnx->createCommand($sql)->queryAll();
        return $menu;
    }
    
    
    /**
     * Devuelve todos los enlaces
     * @return array enlaces
     */
    public static function getItems()
    {
        $items = [];
        $subitems1 = [];
        $subitems2 = [];
        $hasN1 = $hasN2 = $hasN3 = false;
        $models = Menu::getMenuJerarquia(); //find()->all();
        return $models;
    }
    /**
     * Comprueba si enlace tiene hijos
     * @param int $id
     * @return bool
     */
    public function tieneHijosItems($id){
        $resultado = false;
        $menu = array();
        if(!empty($id)){
            $menu = self::getMenuDetallado($id);
            foreach ($menu as $m){
                $resultado = isset($m['hijos']) && $m['hijos'] != '' ? true : false;
            }
        }        
        return $resultado;
    }
}
