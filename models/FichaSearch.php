<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ficha;

/**
 * FichaSearch represents the model behind the search form about `\app\models\Ficha`.
 */
class FichaSearch extends Ficha
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duracion'], 'integer'],
            [['titulo', 'director_id'], 'safe'],
            [['anyo'], 'number'],
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
        $query = Ficha::find()->joinWith('director');

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

        $dataProvider->sort->attributes['director_id'] = [
            'asc' => ['personas.nombre' => SORT_ASC],
            'desc' => ['personas.nombre' => SORT_DESC],
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'anyo' => $this->anyo,
            'duracion' => $this->duracion,
        ]);

        $query->andFilterWhere(['ilike', 'titulo', $this->titulo])
            ->andFilterWhere(['ilike', 'personas.nombre', $this->director_id]);

        return $dataProvider;
    }
}
