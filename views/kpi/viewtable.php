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
    echo "Show Table <b>".$_GET['table']."</b>";

    $dataProvider = new SqlDataProvider([
    'sql' => 'SELECT * FROM '.$_GET['table']. ' WHERE HOSPCODE = '.$_GET['hcode'],
    'pagination' => [
        'pageSize' => 10,
    ],
    //'params' => [':kpi_id' => '$kpi_id'],
]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'showPageSummary' => true,
        
        'columns' => [
            'HOSPCODE',
            'NAME',
            'LNAME'
        ],
    ]);

?>

</div>
