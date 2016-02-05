<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpi */

$this->title = $model->kpi_id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการตัวชี้วัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-view">

    <h1><?php //Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kpi_id',
            'kpi_name',
            'kpi_b_year',
            'kpi_function',
            'kpi_percent_target',
            'kpi_desc',
            'kpi_group',
        ],
    ]) ?>

</div>
