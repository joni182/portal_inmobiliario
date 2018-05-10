<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * InmueblesSearch represents the model behind the search form of `app\models\Inmuebles`.
 */
class InmueblesSearch extends Inmuebles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'propietario_id', 'numero_habitaciones', 'numero_banos'], 'integer'],
            [['propietario_dni', 'caracteristicas'], 'safe'],
            [['precio'], 'number'],
            [['lavavajillas', 'garaje', 'trastero'], 'boolean'],
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
     * Creates data provider instance with search query applied.
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inmuebles::find();

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
            'propietario_id' => $this->propietario_id,
            'lavavajillas' => $this->lavavajillas,
            'garaje' => $this->garaje,
            'trastero' => $this->trastero,
        ]);

        $query->andFilterWhere(['ilike', 'propietario_dni', $this->propietario_dni])
            ->andFilterWhere(['ilike', 'caracteristicas', $this->caracteristicas])
            ->andFilterWhere(['>=', 'precio', $this->precio])
            ->andFilterWhere(['>=', 'numero_habitaciones', $this->numero_habitaciones])
            ->andFilterWhere(['>=', 'numero_banos', $this->numero_banos]);

        return $dataProvider;
    }
}
