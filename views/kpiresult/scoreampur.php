<?php

//use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
//use yii\widgets\Pjax;
use app\models\CmbisKpiResult;
//use app\models\Chospital;
//use app\models\Campur;
//use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerJsFile('./js/app.js');
$this->title = 'ผลงานตามตัวชี้วัด';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php yii\widgets\Pjax::begin(['id' => 'grid-kpiresult-pjax','timeout'=>5000]) ?>

<?php //echo $this->render('_search', ['model' => $searchModel]);?>
<br>
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">จัดอันดับคะแนนระดับอำเภอ</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <?= GridView::widget([
                'id'=>'grid-kpiresult',
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'tableOptions' => [
                  'class' => 'table table-bordered  table-striped table-hover',
                ],
                'panel'=>[
                    'type'=>GridView::TYPE_PRIMARY,
                    //'heading'=>'จัดอันดับคะแนนระดับอำเภอ',
                    'heading' => false,
                    //'before' => 'kpi_name',
                ],
                'columns' => [
                    ['class'=>'kartik\grid\SerialColumn'],
                    'amp',
                    'amphur.Amp_Des',
                    //'kpi_score',
                    //'sumScore',
                    // 'avgScore' => [
                    //     'attribute' => 'คะแนนเฉลี่ย',
                    //     //'enableSorting' => true,
                    //     'format' => ['decimal',2],
                    //     'value' => 'avgScore'
                    // ],
                    //'avgScore',
                    'avg_score' => [
                        'attribute' => 'คะแนนเฉลี่ย',
                        'format'=>['decimal',2],
                        'value' => 'avgScore'
                    ],
                    /*[
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
                   ],*/
                ],
            ]); ?>
<?php yii\widgets\Pjax::end() ?>

<!-- <div class="overlay">
  <i class="fa fa-refresh fa-spin"></i>
</div> -->
  </div><!-- /.box-body -->
</div><!-- /.box -->


