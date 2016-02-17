<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\SqlDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpi */
$this->title='Table';
?>
<div class="cmbis-kpi-view">

<?php
    //echo "Show Table <b>".$_GET['table']."</b>";
    $sql='SELECT count(*) FROM '.$_GET['table']. ' WHERE HOSPCODE = '.$_GET['hcode'];
    $count = Yii::$app->db->createCommand($sql)->queryScalar();
    //echo $count;

    $dataProvider = new SqlDataProvider([
    'sql' => 'SELECT * FROM '.$_GET['table']. ' WHERE HOSPCODE = '.$_GET['hcode'],
    'pagination' => [
        'pageSize' => 10,
    ],
    'totalCount' => $count
    //'params' => [':kpi_id' => '$kpi_id'],
]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'showFooter'=>true,
        'showPageSummary' => false,
        'tableOptions' => [
          'class' => 'table table-bordered  table-striped table-hover',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_DANGER,
            'heading'=>'',
        ],
        'columns' => [
            ['class'=>'kartik\grid\SerialColumn'],
            'HOSPCODE',
            'NAME',
            'LNAME'
        ],
        'pager' => [
            'firstPageLabel' => 'หน้าแรก',
            'lastPageLabel' => 'หน้าสุดท้าย',
        ],
        //'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
    ]);

?>

</div>
