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
                'action' => ['ampur'],
                'method' => 'get',
                'options' => ['data-pjax' => true]
    ]);
    ?>
    <div class="row">
        <div class="col-lg-4">
            <?=
            Html::activeDropDownList($model, 'kpi_id', ArrayHelper::map(app\models\CmbisKpi::find()->all(), 'kpi_id', 'kpi_name'), [
                'prompt' => 'เลือกตัวชี้วัด',
                'class' => 'form-control'
            ]);
            ?>
        </div>
        <div class="col-lg-4">
            <?=
            Html::activeDropDownList($model, 'villcode', ArrayHelper::map(app\models\Campur::find()->where(['changwatcode' => '50'])->all(), 'ampurcodefull', 'ampurname'), [
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
    
<?= $form->field($model, 'villcode') ?>
    
    <?= $form->field($model, 'kpi_result') ?>
    
        <div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    
<?php ActiveForm::end(); ?> -->

</div>
