<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

// use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cmbis-kpi-result-search">

    <br>

    <?php
    $form = ActiveForm::begin([
                'action' => ['scorehosp'],
                'method' => 'get',
                'options' => ['data-pjax' => true]
    ]);
    ?>
    <div class="box box-body box-success">
    <div class="row">
        <div class="col-lg-8">
            <?=
            Html::activeDropDownList($model, 'hcode', ArrayHelper::map(app\models\Campur::find()->where(['changwatcode' => '50'])->all(), 'ampurcodefull', 'ampurname'), [
                'prompt' => 'เลือกอำเภอ',
                'class' => 'form-control'
            ]);
            ?>
        </div>
        <div class="col-lg-4">
            <span class="input-group-btn">
                <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
            <?php
            /* if (Yii::$app->user->identity->getIsAdmin()) { 
              echo Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'เพิ่มตัวชี้วัด'), ['create'], ['class' => 'btn btn-success']);
              } */
            ?>
            </span>
        </div>
    </div>
    </div>
<?php ActiveForm::end(); ?>






    <!--     <?php
$form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]);
?>
    
    <?= $form->field($model, 'kpi_id') ?>
    
<?= $form->field($model, 'kpi_b_year') ?>
    
    <?= $form->field($model, 'hcode') ?>
    
<?php // $form->field($model, 'villcode') ?>
    
    <?= $form->field($model, 'kpi_result') ?>
    
        <div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    
<?php ActiveForm::end(); ?> -->

</div>
