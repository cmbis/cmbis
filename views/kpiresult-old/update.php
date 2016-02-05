<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResult */

$this->title = 'Update Cmbis Kpi Result: ' . ' ' . $model->kpi_id;
$this->params['breadcrumbs'][] = ['label' => 'Cmbis Kpi Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kpi_id, 'url' => ['view', 'kpi_id' => $model->kpi_id, 'kpi_b_year' => $model->kpi_b_year, 'hcode' => $model->hcode, 'villcode' => $model->villcode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cmbis-kpi-result-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
