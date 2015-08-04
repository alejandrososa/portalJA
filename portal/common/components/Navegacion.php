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
        $model = new Menu();
        $items = $model->getItems();
        $menu = '';
        $n1 = $n2 = $n3 = array();
        //return $this->items;
        
        foreach($items as $n){
            if($n['nivel'] == 1){
                $n1[] = $n;
            }            
        }
        foreach($items as $n){
            if($n['nivel'] == 2){
                $n2[] = $n;
            }
        }
        foreach($items as $n){
            if($n['nivel'] == 3){
                $n3[] = $n;
            }
        }
        
               
        foreach($n1 as $link){            
            $menu .= '<li data-id="'.$link['id_menu'].'"><a href="'.$link['enlace'].'" style="border-bottom: 2px solid #45b29d;"><span>'.$link['nombre'].'<span class="m-d-arrow"></span></span></a>';
           
            //segundo nivel0
            if($model->tieneHijosItems($link['id_menu'])){
                $menu .= '<ul class="sub-menu">';
                foreach($n2 as $link2){
                    if($link2['padre'] == $link['id_menu'] ){                
                        $menu .= '<li data-id="'.$link2['id_menu'].'" data-padre="'.$link2['padre'].'"><a href="'.$link2['enlace'].'">'.$link2['nombre'].'</a>';
                        
                       //tercer nivel
                        if($model->tieneHijosItems($link2['id_menu'])){
                            
                            $menu .= '<ul class="sub-menu">';
                            foreach($n3 as $link3){
                                if($link3['padre'] == $link2['id_menu'] ){                    
                                    $menu .= '<li data-id="'.$link3['id_menu'].'" data-padre="'.$link3['padre'].'"><a href="'.$link3['enlace'].'">'.$link3['nombre'].'</a>';
                                    $menu .= '</li>';
                                }
                            } //foreach 3                    
                            $menu .= '</ul>';
                            
                        }//tercer nivel
                        
                        $menu .= '</li>';
                    }
                } // foreach 2
                
                $menu .= '</ul>';
                
            }//segundo nivel
            
            $menu .= '</li>';                                  
        }//foreach 1
        
       
        echo $menu;
    }
    
    
    
    public function prueba() {
        $this->model = new Menu();
        $this->items = $this->model->getMenuDetallado('2');
    
        return $this->items;
    }
}