<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-kpi-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kpi_id')->textInput() ?>

    <?= $form->field($model, 'kpi_b_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'villcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_result')->textInput() ?>

    <?= $form->field($model, 'kpi_target')->textInput() ?>

    <?= $form->field($model, 'kpi_miss')->textInput() ?>

    <?= $form->field($model, 'kpi_percen_result')->textInput() ?>

    <?= $form->field($model, 'kpi_score')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
