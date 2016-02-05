<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisAreaHosp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-area-hosp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AREA_NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hosp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hosp_des')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amp_Des')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TUM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tum_des')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CHK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'No_Count')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CUP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Benchmark')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
