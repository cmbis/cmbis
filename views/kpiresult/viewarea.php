<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\data\SqlDataProvider;



/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResult */

//$this->title = $model->kpi_id;
//$this->params['breadcrumbs'][] = ['label' => 'ผลงานตามตัวชี้วัด', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($_GET);
//$kpi_id = $_GET['CmbisKpiResultSearch']['kpi_id'];
//$pop_group = $_GET['CmbisKpiResultSearch']['kpi_miss'];
/*$dataProvider = new SqlDataProvider([
    'sql' => 'SELECT *, sum(kpi_result) as sum_result, sum(kpi_target) as sum_target, ' . 
             'format(sum(kpi_result)*100/sum(kpi_target),2) as percen '.
             'FROM cmbis_kpi_results ' .
             'INNER JOIN Chospital ON (Chospital.hoscode = cmbis_kpi_results.hcode) ' .
             'INNER JOIN cmbis_hospital ON cmbis_hospital.hcode=cmbis_kpi_results.hcode ' .
             'INNER JOIN cmbis_pop_groups ON cmbis_pop_groups.pop_group_id=cmbis_hospital.pop_group ' .
             'WHERE cmbis_hospital.Amp like "'. $model['vcode'].'%" and pop_group_id = '. $pop_group . ' ' .
             'AND kpi_id =:kpi_id ' .
             'GROUP BY cmbis_kpi_results.hcode ' .
             'ORDER BY kpi_score DESC',
    'pagination' => [
        'pageSize' => 25,
    ],
    'params' => [':kpi_id' => $kpi_id],
]);*/


//echo $model['hcode'];
//$hosname = Chospital::findBySql('SELECT hosname2 FROM Chospital WHERE hoscode = '.$model['hcode'])->one();
//echo $model['hcode'];
//print_r($model)
?>
<div class="cmbis-kpi-result-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showPageSummary' => true,
        
        'columns' => [
            'kpi_id',
            //'kpi_b_year',
            'hcode' => [
                'attribute' => 'รหัสสถานบริการ',
                'value' => 'hcode'
            ],
            'hosname2' => [
                'attribute' => 'สถานบริการ',
                'value' => 'hosname2'
            ],
            //'villcode',
            'sum_target' => [
                'attribute' => 'เป้าหมาย',
                'value' => 'sum_target'
            ],
            /*'kpi_target' => [
                'attribute' => 'เป้าหมาย',
                'value' => 'kpi_target'
            ],*/
            'sum_result' => [
                'attribute' => 'ผลงาน',
                'value' => 'sum_result'
            ],
            /*'kpi_result' => [
                'attribute' => 'ผลงาน',
                'value' => 'kpi_result'
            ],*/
            'kpi_miss',
            'kpi_percen_result' => [
                'attribute' => '%',
                'value' => 'percen'
            ],
            'kpi_score' => [
                'attribute' => 'คะแนน',
                'value' => 'kpi_score'
            ],
        ],
    ]) ?>

    

</div>
