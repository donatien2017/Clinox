<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reductionproduit;

/**
 * ReductionproduitSearch represents the model behind the search form about `backend\models\Reductionproduit`.
 */
class ReductionproduitSearch extends Reductionproduit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproduit', 'idassurance'], 'integer'],
            [['taux'], 'number'],
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
        $query = Reductionproduit::find();

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
            'idproduit' => $this->idproduit,
            'idassurance' => $this->idassurance,
            'taux' => $this->taux,
        ]);

        return $dataProvider;
    }
}
