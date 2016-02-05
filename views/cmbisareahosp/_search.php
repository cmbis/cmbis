<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisAreaHospSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-area-hosp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?=
            Html::activeDropDownList($model, 'AMP', ArrayHelper::map(app\models\Campur::find()->where(['changwatcode' => '50'])->all(), 'ampurcodefull', 'ampurname'), [
                'prompt' => 'เลือกอำเภอ',
                'class' => 'form-control'
            ]);
            ?>

    <?php // $form->field($model, 'VID') ?>

    <?php // $form->field($model, 'AREA_NAME') ?>

    <?php // $form->field($model, 'Hosp') ?>

    <?php // $form->field($model, 'Hosp_des') ?>

    <?php // $form->field($model, 'AMP') ?>

    <?php // echo $form->field($model, 'Amp_Des') ?>

    <?php // echo $form->field($model, 'TUM') ?>

    <?php // echo $form->field($model, 'Tum_des') ?>

    <?php // echo $form->field($model, 'CHK') ?>

    <?php // echo $form->field($model, 'No_Count') ?>

    <?php // echo $form->field($model, 'Remark') ?>

    <?php // echo $form->field($model, 'CUP') ?>

    <?php // echo $form->field($model, 'Benchmark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
