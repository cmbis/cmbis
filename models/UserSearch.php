<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id',  'flags'], 'integer'],
            [['created_at', 'updated_at', 'username', 'auth_key', 'password_hash', 'email'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 15 // in case you want a default pagesize
            ],
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        
        //$dataProvider->query->joinWith('group');
        //$dataProvider->query->joinWith('departmentsDepartment');
        //$dataProvider->query->joinWith('pos');
       // $dataProvider->query->joinWith('degree1');

        $query->andFilterWhere([
            //'id' => $this->id,
            //'role' => $this->role,
            'flags' => $this->flags,
            //'position_id' => $this->position_id,
            //'degree_id' => $this->degree_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
                //->andFilterWhere(['like', 'auth_key', $this->auth_key])
                //->andFilterWhere(['like', 'password_hash', $this->password_hash])
                //->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'registration_ip', $this->registration_ip])
                //->andFilterWhere(['like', 'city', $this->city])
                //->andFilterWhere(['like', 'name', $this->name])
                //->andFilterWhere(['like', 'avatar', $this->avatar])
                //->andFilterWhere(['like', 'banner_top', $this->banner_top])
                //->andFilterWhere(['like', 'params', $this->params])
                //->andFilterWhere(['like', 'position', $this->position])
                //->andFilterWhere(['like', 'hobby', $this->hobby])
                //->andFilterWhere(['like', 'updated_at', $this->updated_at])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                //->andFilterWhere(['like', 'description', $this->description])
                //->andFilterWhere(['like', 'groups.name', $this->group_id])
                //->andFilterWhere(['like', 'departments.name', $this->department_id])
                //->andFilterWhere(['like', 'degrees.name', $this->degree_id])
                ;

        return $dataProvider;
    }

}
