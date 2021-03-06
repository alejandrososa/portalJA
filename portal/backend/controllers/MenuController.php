<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use common\models\Paginas;
use backend\models\MenuBuscador;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Object;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuBuscador();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCrear()
    {
        $model = new Menu();
        $modelPaginas = new Paginas();
       
        if ($model->load(Yii::$app->request->post())) {
            
            $post = Yii::$app->request->post('Menu');
            
            $model->nombre  = $post['nombre'];
            $model->clase   = !empty($post['clase']) ? $post['clase'] : '';
            $model->enlace  = !empty($post['url']) ? $post['url'] : '#';
            $model->target  = !empty($post['target']) ? $post['target'] : '_self';
            $model->padre   = !empty($post['padre']) ? $post['padre'] : 0;
            /*
            echo '<pre>';
            print_r($post);
            echo '</pre>';
            die();
            */
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id_menu]);
            }
        } else {
            return $this->render('crear', [
                'model' => $model,
                'modPaginas' => $modelPaginas
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelPaginas = new Paginas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_menu]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modPaginas' => $modelPaginas
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
