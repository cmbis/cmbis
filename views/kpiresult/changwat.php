<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\CmbisKpiResult;
//use app\models\Chospital;
use app\models\Campur;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลงานตามตัวชี้วัด';
$this->params['breadcrumbs'][] = $this->title;

$kpi_id=$searchModel['kpi_id'];

/*$dataProvider = new SqlDataProvider([
    'sql' => 'SELECT * , avg(r.kpi_score) as avg_score '.
             'FROM cmbis_kpi_results r '.
             'INNER JOIN campur a ON a.ampurcodefull=SUBSTR(r.villcode,1,4) '.
             'INNER JOIN chospital c ON c.hoscode=r.hcode '.
             'INNER JOIN cmbis_kpi k ON k.kpi_id=r.kpi_id '.
             'WHERE r.kpi_id =:kpi_id '.
             'GROUP BY hcode '.
             'ORDER BY avg_score DESC ',
    'pagination' => [
        'pageSize' => 50,
        //'page' => 'page',
        //'pageSizeLimit' => [1,20],
        //'pageSizeParam' => 'per_page',
        //'totalCount' => 298,
    ],
    'params' => [':kpi_id' => $kpi_id],
    'totalCount' => 298,
]);*/

?>

<?php yii\widgets\Pjax::begin(['id' => 'grid-kpiresult-pjax','timeout'=>5000]) ?>

<?php  echo $this->render('_searchchangwat', ['model' => $searchModel]);?>

<?php
    //print_r ($model);

?>

<?= GridView::widget([
                'id'=>'grid-kpiresult',
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'tableOptions' => [
                  'class' => 'table table-bordered  table-striped table-hover',
                ],
                'panel'=>[
                    'type'=>GridView::TYPE_PRIMARY,
                    'heading'=>'เปรียบเทียบทั้งจังหวัด',
                ],
                'columns' => [
                    ['class'=>'kartik\grid\SerialColumn'],
                    //'ampurcodefull',
                    /*[
                        'class'=>'kartik\grid\ExpandRowColumn',
                        'width'=>'20px',
                        'value'=>function ($model, $key, $index, $widget) { 
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail'=>function ($model) {
                            //echo $model['villcode'];
                            return Yii::$app->controller->renderPartial('viewampur', ['model'=>$model]);
                        },
                    ],
                    'ampurname' => [
                        'attribute' => 'อำเภอ',
                        'value' => 'ampurname'
                    ],
                    'sum_score' => [
                        'attribute' => 'คะแนนรวม',
                        'value' => 'sum_score'
                    ],
                    'avg_score' => [
                        'attribute' => 'ค่าเฉลี่ยคะแนน',
                        'format'=>['decimal',2],
                        'value' => 'avg_score'
                    ],*/
                    'kpi_id',
                    'hcode',
                    'hoscode.hosname2',
                    'amphur.Amp_Des',
                    /*[
                      'attribute' => 'ชื่อสถานบริการ',
                      'value' => function($model){return $model->hoscode->hosname2;},
                    ],
                    [
                      'attribute' => 'อำเภอ',
                      'value' => function($model){return $model->amphur->Amp;},
                    ],*/
                    //'hosname2',
                    //'ampurname',
                    'kpi_function'=>[
                        'attribute' =>'ผลงาน',
                        'format' => 'html',
                        'value'=>function($model){
                            $url = Url::to(['/kpi/viewtable', 'table' => $model->kpitable->kpi_function,'hcode' => $model['hcode']]);
                            return Html::a($model['kpi_result'],$url);
                        },
                    ],
                    'avg_score' => [
                        'attribute' => 'คะแนน',
                        'format'=>['decimal',2],
                        'value' => 'avgScore',
                    ],

                ],
                'pager' => [
                    'firstPageLabel' => 'หน้าแรก',
                    'lastPageLabel' => 'หน้าสุดท้าย',
                ],
            ]); ?>
<?php yii\widgets\Pjax::end() ?>



