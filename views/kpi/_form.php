<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-kpi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kpi_id')->textInput() ?>

    <?= $form->field($model, 'kpi_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_b_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_function')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_percent_target')->textInput() ?>

    <?= $form->field($model, 'kpi_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kpi_group')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
