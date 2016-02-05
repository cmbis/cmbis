<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CmbisKpi;

/**
 * CmbisKpiSearch represents the model behind the search form about `app\models\CmbisKpi`.
 */
class CmbisKpiSearch extends CmbisKpi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'kpi_percent_target', 'kpi_group'], 'integer'],
            [['kpi_name', 'kpi_b_year', 'kpi_function', 'kpi_desc'], 'safe'],
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
        $query = CmbisKpi::find();

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
            'kpi_id' => $this->kpi_id,
            'kpi_percent_target' => $this->kpi_percent_target,
            'kpi_group' => $this->kpi_group,
        ]);

        $query->andFilterWhere(['like', 'kpi_name', $this->kpi_name])
            ->andFilterWhere(['like', 'kpi_b_year', $this->kpi_b_year])
            ->andFilterWhere(['like', 'kpi_function', $this->kpi_function])
            ->andFilterWhere(['like', 'kpi_desc', $this->kpi_desc]);

        return $dataProvider;
    }
}
