<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpi */

$this->title = 'แก้ไขตัวชี้วัด: ' . ' ' . $model->kpi_id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการตัวชี้วัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kpi_id, 'url' => ['view', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="cmbis-kpi-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
