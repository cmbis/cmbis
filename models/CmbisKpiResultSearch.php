<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CmbisKpiResult;

/**
 * CmbisKpiResultSearch represents the model behind the search form about `app\models\CmbisKpiResult`.
 */
class CmbisKpiResultSearch extends CmbisKpiResult {

    /**
     * @inheritdoc
     */
    public $q;

    public function rules() {
        return [
            [['kpi_id', 'kpi_result', 'kpi_target', 'kpi_miss'], 'integer'],
            [['kpi_b_year', 'hcode', 'villcode', 'q'], 'safe'],
            [['kpi_percen_result', 'kpi_score'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = CmbisKpiResult::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'kpi_id' => SORT_ASC,
                    'villcode' => SORT_ASC,
                    'hcode' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->select('*,SUM(kpi_result) as sum_result')
                ->andFilterWhere([
            'kpi_id' => $this->kpi_id,
            'kpi_result' => $this->kpi_result,
            'kpi_target' => $this->kpi_target,
            'kpi_miss' => $this->kpi_miss,
            'kpi_percen_result' => $this->kpi_percen_result,
            'kpi_score' => $this->kpi_score,
        ]);

        $query->andFilterWhere(['like', 'kpi_id', $this->q])

                // andFilterWhere(['like', 'kpi_b_year', $this->kpi_b_year])
                // ->andFilterWhere(['like', 'hcode', $this->hcode])
                //->andFilterWhere(['like', 'villcode', $this->villcode])
                ->andWhere('villcode LIKE "' . $this->villcode . '%" ')
                ->groupBy(['hcode',]);


        return $dataProvider;
    }

}
