<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CmbisAreaHosp;

/**
 * CmbisAreaHospSearch represents the model behind the search form about `app\models\CmbisAreaHosp`.
 */
class CmbisAreaHospSearch extends CmbisAreaHosp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VID', 'AREA_NAME', 'Hosp', 'Hosp_des', 'AMP', 'Amp_Des', 'TUM', 'Tum_des', 'CHK', 'No_Count', 'Remark', 'CUP', 'Benchmark'], 'safe'],
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
        $query = CmbisAreaHosp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    //'kpi_id' => SORT_ASC,
                    //'villcode' => SORT_ASC,
                    'kpi_percen_result' => SORT_DESC,
                    'kpi_score' => SORT_DESC,
                ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'VID', $this->VID])
            ->andFilterWhere(['like', 'AREA_NAME', $this->AREA_NAME])
            //->andFilterWhere(['like', 'Hosp', $this->Hosp])
            //->andFilterWhere(['like', 'Hosp_des', $this->Hosp_des])
            ->andFilterWhere(['like', 'AMP', $this->AMP]);
            //->andFilterWhere(['like', 'Amp_Des', $this->Amp_Des])
            //->andFilterWhere(['like', 'TUM', $this->TUM])
            //->andFilterWhere(['like', 'Tum_des', $this->Tum_des])
            //->andFilterWhere(['like', 'CHK', $this->CHK])
            //->andFilterWhere(['like', 'No_Count', $this->No_Count])
            //->andFilterWhere(['like', 'Remark', $this->Remark])
            //->andFilterWhere(['like', 'CUP', $this->CUP])
            //->andFilterWhere(['like', 'Benchmark', $this->Benchmark]);

        return $dataProvider;
    }
}
