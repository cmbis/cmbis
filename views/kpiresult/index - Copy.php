<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Chospital;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลงานตามตัวชี้วัด';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php yii\widgets\Pjax::begin(['id' => 'grid-kpiresult-pjax','timeout'=>5000]) ?>

<?php echo $this->render('_search', ['model' => $searchModel]);?>
<br>


<?= GridView::widget([
                'id'=>'grid-kpiresult',
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'tableOptions' => [
                  'class' => 'table table-bordered  table-striped table-hover',
                ],
                'columns' => [
                    // ['class' => 'yii\grid\SerialColumn'],
                    //'kpi_id',
                    'kpi_b_year',
                    //'hcode',
                    [
                      'attribute' => 'hcode',
                      'value' => function($model){return $model->hoscode->hosname2;},
                    ],
                    //'villcode',
                    'kpi_target',
                    'kpi_result',
                    'kpi_score',
                    'kpi_percen_result',
                    [
                      'label'=>'ผลการประเมิน',
                      'format'=>'html',
                      'value'=>function($model){
                          return $model->kpi_percen_result<60?'<i class="glyphicon glyphicon-remove"></i> 
                          <span class="text-danger">ไม่ผ่าน</span>':'<i class="glyphicon glyphicon-ok"></i> 
                          <span class="text-success">ผ่าน</span>';
                      }
                    ],
                    
                    [
                      'class' => 'yii\grid\ActionColumn',
                      'options'=>['style'=>'width:120px;'],
                      'buttonOptions'=>['class'=>'btn btn-default'],
                      'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                      'visible' => Yii::$app->user->identity->getIsAdmin()
                   ],
                ],
            ]); ?>
<?php yii\widgets\Pjax::end() ?>



