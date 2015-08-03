<?php
namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use common\models\Menu;
use yii\base\Object;


class Navegacion extends Component {
    public $web;
    public $adminUrl;
    private $model;
    private $items = array();
    
    public function Principal() {
        $this->model = new Menu();
        $this->items = $this->model->getItems();
        
        return $this->items;
    }
    
    public function prueba() {
        $this->model = new Menu();
        $this->items = $this->model->getMenuDetallado('2');
    
        return $this->items;
    }
}