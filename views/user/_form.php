<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'disabled' => true]) ?>
            
            <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

        </div>
        <div class="col-md-6">
            <p>&nbsp;</p>
            <?php
            echo $form->field($model, 'flags')->widget(CheckboxX::classname(), [
                'pluginOptions' => ['threeState' => false],
            ]);
            ?>
            <?php // $form->field($model, 'role')->dropDownList(app\models\User::$roles) ?>



        </div>
  
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
