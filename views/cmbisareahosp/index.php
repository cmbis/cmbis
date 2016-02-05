<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisAreaHospSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตรวจสอบหมู่บ้าน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-area-hosp-index">
    
    <?php yii\widgets\Pjax::begin(['id' => 'grid-kpiresult-pjax','timeout'=>5000]) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <br>


    <?=
    GridView::widget([
        'id' => 'grid-kpiresult',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered  table-striped table-hover',
        ],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => 'เปรียบเทียบทั้งจังหวัด',
        ],
        'columns' => [
            'VID',
            'AREA_NAME',
            'Hosp',
            'Hosp_des',
            'AMP',
            'Amp_Des',
            'TUM',
            'Tum_des',
            //'CHK',
            //'No_Count',
            //'Remark',
            'CUP',
            'Benchmark',
                /* [
                  'class' => 'yii\grid\ActionColumn',
                  'options'=>['style'=>'width:120px;'],
                  'buttonOptions'=>['class'=>'btn btn-default'],
                  'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                  'visible' => Yii::$app->user->identity->getIsAdmin()
                  ], */
                ],
            ]);
            ?>
        <?php yii\widgets\Pjax::end() ?>

</div>
