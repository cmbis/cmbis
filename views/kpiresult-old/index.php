<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CmbisKpiResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cmbis Kpi Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-result-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cmbis Kpi Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'kpi_id',
                'kpi_b_year',
                'hcode',
                'villcode',
            //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

</div>
