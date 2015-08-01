<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Paginas;

/**
 * BuscarPaginas represents the model behind the search form about `common\models\Paginas`.
 */
class BuscarPaginas extends Paginas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pag', 'meta_id', 'imagen_id', 'autor_id', 'creado', 'actualizado'], 'integer'],
            [['titulo', 'contenido', 'estado', 'slug', 'meta_keywords', 'meta_description', 'meta_code_css', 'meta_code_js'], 'safe'],
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
        $query = Paginas::find();

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
            'id_pag' => $this->id_pag,
            'meta_id' => $this->meta_id,
            'imagen_id' => $this->imagen_id,
            'autor_id' => $this->autor_id,
            'creado' => $this->creado,
            'actualizado' => $this->actualizado,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'contenido', $this->contenido])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_code_css', $this->meta_code_css])
            ->andFilterWhere(['like', 'meta_code_js', $this->meta_code_js]);

        return $dataProvider;
    }
}
