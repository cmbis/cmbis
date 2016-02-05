<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-kpi-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'kpi_b_year') ?>

    <?= $form->field($model, 'hcode') ?>

    <?= $form->field($model, 'villcode') ?>

    <?= $form->field($model, 'kpi_result') ?>

    <?php // echo $form->field($model, 'kpi_target') ?>

    <?php // echo $form->field($model, 'kpi_miss') ?>

    <?php // echo $form->field($model, 'kpi_percen_result') ?>

    <?php // echo $form->field($model, 'kpi_score') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
