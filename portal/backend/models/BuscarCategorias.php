<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Categorias;

/**
 * BuscarCategorias represents the model behind the search form about `common\models\Categorias`.
 */
class BuscarCategorias extends Categorias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria'], 'integer'],
            [['slug', 'nombre', 'descripcion', 'padre', 'count'], 'safe'],
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
        $query = Categorias::find();

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
            'id_categoria' => $this->id_categoria,
        ]);

        $query->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'padre', $this->padre])
            ->andFilterWhere(['like', 'count', $this->count]);

        return $dataProvider;
    }
}
