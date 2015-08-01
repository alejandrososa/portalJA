<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Menu;

/**
 * MenuBuscador represents the model behind the search form about `common\models\Menu`.
 */
class MenuBuscador extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu', 'padre'], 'integer'],
            [['nombre', 'clase', 'enlace', 'tipo_enlace', 'target'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Menu::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_menu' => $this->id_menu,
            'padre' => $this->padre,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'clase', $this->clase])
            ->andFilterWhere(['like', 'enlace', $this->enlace])
            ->andFilterWhere(['like', 'tipo_enlace', $this->tipo_enlace])
            ->andFilterWhere(['like', 'target', $this->target]);

        return $dataProvider;
    }
}
