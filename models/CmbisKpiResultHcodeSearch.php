<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CmbisKpiResult;

/**
 * CmbisKpiResultSearch represents the model behind the search form about `app\models\CmbisKpiResult`.
 */
class CmbisKpiResultHcodeSearch extends CmbisKpiResultHcode {

    /**
     * @inheritdoc
     */
    public $q;

    public function rules() {
        return [
            [['kpi_id', 'kpi_result', 'kpi_target', 'kpi_miss'], 'integer'],
            [['kpi_b_year', 'hcode',  'q'], 'safe'],
            [['kpi_percen_result', 'kpi_score','avgScore'], 'number'],
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
        $query -> innerJoin('cmbis_area_hosp', 'Hosp=hcode');
        $query -> innerJoin('cmbis_hospital', 'cmbis_hospital.hcode=cmbis_kpi_result_hcode.hcode');
        $query -> innerJoin('cmbis_pop_groups', 'pop_group_id=pop_group');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    //'kpi_id' => SORT_ASC,
                    //'villcode' => SORT_ASC,
                    //'hcode' => SORT_DESC,
                    'kpi_score' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'kpi_id' => $this->kpi_id,
            'kpi_result' => $this->kpi_result,
            'kpi_target' => $this->kpi_target,
            //'kpi_miss' => $this->kpi_miss,
            'kpi_percen_result' => $this->kpi_percen_result,
            'kpi_score' => $this->kpi_score,
            //'pop_group' => $this->pop_group,
        ]);

        $query->andFilterWhere(['like', 'kpi_id', $this->q])

                // andFilterWhere(['like', 'kpi_b_year', $this->kpi_b_year])
                // ->andFilterWhere(['like', 'hcode', $this->hcode])
                //->andFilterWhere(['like', 'villcode', $this->villcode])
                ->andWhere('cmbis_area_hosp.Amp LIKE "' . $this->hcode . '%" ')
                ->andWhere('pop_group LIKE "' . $this->kpi_miss . '%" ')
                ->groupBy(['cmbis_kpi_result_hcode.hcode',])
                ->orderBy('avg(kpi_score) DESC');


        return $dataProvider;
    }

}
