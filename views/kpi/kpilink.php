<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการตัวชี้วัด';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-index">

    <h1><?php // Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>สร้างตัวชี้วัดใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'kpi_id',
            'kpi_name',
            'kpi_b_year',
            'kpi_function'=>[
                'attribute' =>'ตาราง',
                'format' => 'html',
                'value'=>function($model){
                    $url = Url::to(['/kpi/viewtable', 'table' => $model->kpi_function,'kpi_id'=>$model->kpi_id]);
                    return Html::a('linkTable kpi = '.$model->kpi_id,$url);
                },
            ],
            'kpi_percent_target',
            // 'kpi_desc',
            // 'kpi_group',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
