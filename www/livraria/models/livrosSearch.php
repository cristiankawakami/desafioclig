<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Livros;

/**
 * livrosSearch represents the model behind the search form of `app\models\Livros`.
 */
class livrosSearch extends Livros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['titulo', 'autor', 'categoria_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Livros::find();
        $query->joinWith("categoria");

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
                ->andFilterWhere(['like', 'autor', $this->autor])
                ->andFilterWhere(['like', 'categoria.nome', $this->categoria_id]);

        return $dataProvider;
    }
}
