<?php

namespace app\controllers;

use Yii;
use app\models\CmbisKpiResult;
use app\models\CmbisKpiResultAmp;
use app\models\CmbisKpiResultAmpSearch;
use app\models\CmbisKpiResultHcode;
use app\models\CmbisKpiResultHcodeSearch;
use app\models\CmbisKpiResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\Sort;

/**
 * KpiresultController implements the CRUD actions for CmbisKpiResult model.
 */
class KpiresultController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CmbisKpiResult models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CmbisKpiResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChangwat() {
        $searchModel = new CmbisKpiResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('changwat', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionScorechangwat() {
        $query = CmbisKpiResultHcode::find()
                -> groupBy(['hcode',])
                -> orderBy('avg(kpi_score) DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $dataProvider->setSort([
        'attributes' => [
            'avgScore' => [
                            'asc' =>    [ 'avg(kpi_score)' => SORT_ASC],
                            'desc' =>   [ 'avg(kpi_score)' => SORT_DESC],
                            'default' => SORT_ASC,
                            'label' =>  'avg_score',
                          ],
                        ],
        ]);

        return $this->render('scorechangwat', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAmpur() {
        $searchModel = new CmbisKpiResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('ampur', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionKpiampur() {
        $searchModel = new CmbisKpiResultAmpSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('kpiampur', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionScorehosp() {
        $searchModel = new CmbisKpiResultHcodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $dataProvider->setSort([
        'attributes' => [
            'avgScoreHosp' => [
                            'asc' =>    [ 'avg(kpi_score)' => SORT_ASC],
                            'desc' =>   [ 'avg(kpi_score)' => SORT_DESC],
                            'default' => SORT_DESC,
                            'label' =>  'avg_score'
                          ],
                        ]
        ]);

        return $this->render('scorehosp', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }
    
    public function actionArea() {
        $searchModel = new CmbisKpiResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('area', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionScorearea() {
        $searchModel = new CmbisKpiResultHcodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('scorearea', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }


    public function actionScoreampur() {
        
        $query = CmbisKpiResultAmp::find()
                -> groupBy(['amp',])
                -> orderBy('avg(kpi_score) DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 25,
            ],
        ]);

        $dataProvider->setSort([
        'attributes' => [
            'avgScore' => [
                            'asc' =>    [ 'avg(kpi_score)' => SORT_ASC],
                            'desc' =>   [ 'avg(kpi_score)' => SORT_DESC],
                            'default' => SORT_ASC,
                            'label' =>  'avg_score'
                          ],
                        ]
        ]);     

        return $this->render('scoreampur', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmbisKpiResult model.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @param string $hcode
     * @param string $villcode
     * @return mixed
     */
    public function actionView($kpi_id, $kpi_b_year, $hcode, $villcode) {
        return $this->render('view', [
                    'model' => $this->findModel($kpi_id, $kpi_b_year, $hcode, $villcode),
        ]);
    }

    /**
     * Creates a new CmbisKpiResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CmbisKpiResult();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year, 'hcode' => $model->hcode, 'villcode' => $model->villcode]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmbisKpiResult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @param string $hcode
     * @param string $villcode
     * @return mixed
     */
    public function actionUpdate($kpi_id, $kpi_b_year, $hcode, $villcode) {
        $model = $this->findModel($kpi_id, $kpi_b_year, $hcode, $villcode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year, 'hcode' => $model->hcode, 'villcode' => $model->villcode]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CmbisKpiResult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @param string $hcode
     * @param string $villcode
     * @return mixed
     */
    public function actionDelete($kpi_id, $kpi_b_year, $hcode, $villcode) {
        $this->findModel($kpi_id, $kpi_b_year, $hcode, $villcode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CmbisKpiResult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @param string $hcode
     * @param string $villcode
     * @return CmbisKpiResult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kpi_id, $kpi_b_year, $hcode, $villcode) {
        if (($model = CmbisKpiResult::findOne(['kpi_id' => $kpi_id, 'kpi_b_year' => $kpi_b_year, 'hcode' => $hcode, 'villcode' => $villcode])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
