<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResult */

//$this->title = $model->kpi_id;
//$this->params['breadcrumbs'][] = ['label' => 'ผลงานตามตัวชี้วัด', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-result-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a('Update', ['update', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year, 'hcode' => $model->hcode, 'villcode' => $model->villcode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year, 'hcode' => $model->hcode, 'villcode' => $model->villcode], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kpi_id',
            'kpi_b_year',
            'hcode',
            'villcode',
            'kpi_result',
            'kpi_target',
            'kpi_miss',
            'kpi_percen_result',
            'kpi_score',
        ],
    ]) ?>

</div>
