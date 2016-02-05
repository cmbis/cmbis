<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\CmbisKpiResult;
use app\models\Chospital;
use app\models\Campur;
use yii\helpers\ArrayHelper;

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
                'panel'=>[
                    'type'=>GridView::TYPE_PRIMARY,
                    'heading'=>'เปรียบเทียบทั้งจังหวัด',
                ],
                'columns' => [
                    //['class'=>'kartik\grid\SerialColumn'],
                    // ['class' => 'yii\grid\SerialColumn'],
                    //'kpi_id',
                    //'kpi_b_year',
                    [
                        'class'=>'kartik\grid\ExpandRowColumn',
                        'width'=>'20px',
                        'value'=>function ($model, $key, $index, $widget) { 
                            return GridView::ROW_COLLAPSED;
                        },
                        'detail'=>function ($model) {
                            return Yii::$app->controller->renderPartial('view', ['model'=>$model]);
                        },
                    ],
                    [
                        'attribute'=>'อำเภอ', 
                        'width'=>'200px',
                        'value'=>function ($model, $key, $index, $widget) { 
                            //return GridView::ROW_COLLAPSED;
                            return $model->ampurcode->ampurname;
                        },
                        /*'filterType'=>GridView::FILTER_SELECT2,
                        'filter'=>ArrayHelper::map(Campur::find()->orderBy('ampurcodefull')->asArray()->all(), 'ampurcodefull', 'ampurname'), 
                        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear'=>true],
                        ],*/
                        'group'=>true,  // enable grouping
                        //'groupedRow'=>true,
                        //'groupOddCssClass'=>'kv-grouped-row',
                        //'groupEvenCssClass'=>'kv-grouped-row',
                        //'enableRowClick'=>'kv-disable-click',

                    ],
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
                    
                    /*[
                      'class' => 'yii\grid\ActionColumn',
                      'options'=>['style'=>'width:120px;'],
                      'buttonOptions'=>['class'=>'btn btn-default'],
                      'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                      'visible' => Yii::$app->user->identity->getIsAdmin()
                   ],*/
                ],
            ]); ?>
<?php yii\widgets\Pjax::end() ?>



