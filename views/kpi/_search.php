<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-kpi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kpi_id') ?>

    <?= $form->field($model, 'kpi_name') ?>

    <?= $form->field($model, 'kpi_b_year') ?>

    <?= $form->field($model, 'kpi_function') ?>

    <?= $form->field($model, 'kpi_percent_target') ?>

    <?php // echo $form->field($model, 'kpi_desc') ?>

    <?php // echo $form->field($model, 'kpi_group') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
