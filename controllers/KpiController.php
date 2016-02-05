<?php

namespace app\controllers;

use Yii;
use app\models\CmbisKpi;
use app\models\CmbisKpiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KpiController implements the CRUD actions for CmbisKpi model.
 */
class KpiController extends Controller
{
    public function behaviors()
    {
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
     * Lists all CmbisKpi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CmbisKpiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CmbisKpi model.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @return mixed
     */
    public function actionView($kpi_id, $kpi_b_year)
    {
        return $this->render('view', [
            'model' => $this->findModel($kpi_id, $kpi_b_year),
        ]);
    }

    /**
     * Creates a new CmbisKpi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CmbisKpi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CmbisKpi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @return mixed
     */
    public function actionUpdate($kpi_id, $kpi_b_year)
    {
        $model = $this->findModel($kpi_id, $kpi_b_year);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CmbisKpi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @return mixed
     */
    public function actionDelete($kpi_id, $kpi_b_year)
    {
        $this->findModel($kpi_id, $kpi_b_year)->delete();

        return $this->redirect(['index']);
    }
    
    public function  actionKpilist(){
        $Kpi = CmbisKpi::find()->orderBy('kpi_id')->all();
        $Kpilist = \yii\helpers\ArrayHelper::map($Kpi,'kpi_id','kpi_name');
        
        $CmbisKpi = new CmbisKpi();
        
        $post = Yii::$app->request->post();
        $kpi_id= null;
        
        if (!empty($post)){
            $kpi_id = $post['CmbisKpi']['kpi_id'];
        }
        
        return $this->render('/kpi/kpilist',[
            'Kpilist' => $Kpilist,
            'Kpi' => $CmbisKpi,
            'kpi_id' => $kpi_id,
        ]);
    }

    /**
     * Finds the CmbisKpi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $kpi_id
     * @param string $kpi_b_year
     * @return CmbisKpi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kpi_id, $kpi_b_year)
    {
        if (($model = CmbisKpi::findOne(['kpi_id' => $kpi_id, 'kpi_b_year' => $kpi_b_year])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
