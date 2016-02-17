<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\CmbisKpiResult;
use app\models\Chospital;
use app\models\Campur;
use yii\helpers\ArrayHelper;
//use yii\data\SqlDataProvider;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลงานตามตัวชี้วัด';
$this->params['breadcrumbs'][] = $this->title;

//$kpi_id=$searchModel['kpi_id'];
//$pop_group=$searchModel['kpi_miss'];
//echo "ค่า pop_group = ".$pop_group;

/*$dataProvider = new SqlDataProvider([
    'sql' => 'SELECT *, sum(cmbis_kpi_results.kpi_score) as sum_score , ' . 
             'avg(cmbis_kpi_results.kpi_score) as avg_score , ' . 
             'substr(cmbis_kpi_results.villcode,1,4) as vcode ' .
             'FROM Campur ' .
             'INNER JOIN cmbis_kpi_results ON (substr(cmbis_kpi_results.villcode,1,4)=Campur.ampurcodefull) ' .
             'INNER JOIN cmbis_hospital ON cmbis_hospital.hcode=cmbis_kpi_results.hcode ' .
             'INNER JOIN cmbis_pop_groups ON cmbis_pop_groups.pop_group_id=cmbis_hospital.pop_group ' .
             'WHERE changwatcode=50 and cmbis_kpi_results.kpi_target <> 0 ' .
             'AND kpi_id=:kpi_id ' .
             'AND cmbis_hospital.pop_group=:pop_group '.
             'GROUP BY ampurcode ' .
             'ORDER BY avg_score DESC',
    'pagination' => [
        'pageSize' => 25,
    ],
    'params' => [':kpi_id' => $kpi_id,
                 ':pop_group' => $pop_group],
]);*/

?>

<?php yii\widgets\Pjax::begin(['id' => 'grid-kpiresult-pjax','timeout'=>5000]) ?>

<?php  echo $this->render('_searcharea', ['model' => $searchModel]);?>
<?php
    if (!$searchModel['kpi_id'] || !$searchModel['kpi_miss'])
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CmbisKpiResult::find()->where(['kpi_id'=>NULL]),
            'sort' => [
                'defaultOrder' => [
                    'kpi_id' => SORT_ASC,
                    //'villcode' => SORT_ASC,
                    'hcode' => SORT_DESC,
                ]
            ],
        ]);
    }
    //print_r($dataProvider);
?>

<br>


<?= GridView::widget([
                'id'=>'grid-kpiresult',
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'tableOptions' => [
                  'class' => 'table table-bordered  table-striped table-hover',
                ],
                'panel'=>[
                    'type'=>GridView::TYPE_SUCCESS,
                    'heading'=>'เปรียบเทียบตามขนาดประชากร',

                ],
                'columns' => [
                    ['class'=>'kartik\grid\SerialColumn'],
                    //'kpi_id',
                    'hcode',
                    'hoscode.hosname2',
                    //'kpi_miss',
                    //'pgroup.pop_group',
                    'amphur.Amp_Des',
                    'kpi_target',
                    'kpi_result',
                    'kpi_percen_result',
                    'kpi_score'
                    /*[
                        'class'=>'kartik\grid\ExpandRowColumn',
                        'width'=>'20px',
                        'value'=>function ($model, $key, $index, $widget) { 
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail'=>function ($model) {
                            //echo $model['villcode'];
                            return Yii::$app->controller->renderPartial('viewarea', ['model'=>$model]);
                        },
                    ],
                    'ampurname' => [
                        'attribute' => 'อำเภอ',
                        'value' => 'ampurname'
                    ],*/
                    /*'sum_score' => [
                        'attribute' => 'คะแนนรวม',
                        'value' => 'sum_score'
                    ],
                    'avg_score' => [
                        'attribute' => 'ค่าเฉลี่ยคะแนน',
                        'format'=>['decimal',2],
                        'value' => 'avg_score'
                    ],*/


                ],
                'pager' => [
                    'firstPageLabel' => 'หน้าแรก',
                    'lastPageLabel' => 'หน้าสุดท้าย',
                ],
            ]); ?>
<?php yii\widgets\Pjax::end() ?>



