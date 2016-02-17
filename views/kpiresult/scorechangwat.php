<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\CmbisKpiResult;
use app\models\Chospital;
use app\models\Campur;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลงานตามตัวชี้วัด';
$this->params['breadcrumbs'][] = $this->title;

//$kpi_id=$searchModel['kpi_id'];

// $dataProvider = new SqlDataProvider([
//     'sql' => 'SELECT *, sum(cmbis_kpi_results.kpi_score) as sum_score , ' . 
//              'avg(cmbis_kpi_results.kpi_score) as avg_score , ' . 
//              'substr(cmbis_kpi_results.villcode,1,4) as vcode ' .
//              'FROM Campur ' .
//              'INNER JOIN cmbis_kpi_results ON (substr(cmbis_kpi_results.villcode,1,4)=Campur.ampurcodefull) ' .
//              'WHERE changwatcode=50 and cmbis_kpi_results.kpi_target <> 0 ' .
//              'AND kpi_id=:kpi_id '.
//              'GROUP BY ampurcode ' .
//              'ORDER BY avg_score DESC',
//     'pagination' => [
//         'pageSize' => 25,
//     ],
//     'params' => [':kpi_id' => $kpi_id],
// ]);

?>

<?php yii\widgets\Pjax::begin(['id' => 'grid-kpiresult-pjax','timeout'=>5000]) ?>

<?php  //echo $this->render('_searchchangwat', ['model' => $searchModel]);?>
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
                'heading'=>'จัดอันดับคะแนนระดับหน่วยงาน',
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
                ],*/
                
                'hcode',
                'hoscode.hosname2',
                'amphur.Amp_Des',
                'avgScore',
                'kpi_percen_result',
                'avg_score' => [
                    'attribute' => 'คะแนนเฉลี่ย',
                    'format'=>['decimal',2],
                    'value' => 'avgScore'
                ],
            ],
            'pager' => [
                'firstPageLabel' => 'หน้าแรก',
                'lastPageLabel' => 'หน้าสุดท้าย',
            ],
        ]); ?>
<?php yii\widgets\Pjax::end() ?>



