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
                'action' => ['kpiampur'],
                'method' => 'get',
                'options' => ['data-pjax' => true]
    ]);
    ?>
    <div class="box box-body box-success">
    <div class="row">
    <div class="col-md-8">
        <?php
        //echo "เลือกตัวชี้วัด : ";
        echo Html::activeDropDownList($model, 'kpi_id', ArrayHelper::map(app\models\CmbisKpi::find()->all(), 'kpi_id', 'kpi_name'), [
            'prompt' => 'เลือกตัวชี้วัด',
            'class' => 'form-control'
        ]);
        ?>
    </div>
    <div class="col-md-4">
        <?php // $form->field($model,'kpi_b_year')->hiddenInput(['value'=> 2559])->label(false); ?>
        <!--<span class="input-group-btn">-->
            <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
        <?php 
            /*if (Yii::$app->user->identity->getIsAdmin()) { 
                echo Html::a('<i class="glyphicon glyphicon-plus"></i> ' . Yii::t('app', 'เพิ่มตัวชี้วัด'), ['create'], ['class' => 'btn btn-success']); 
            } */
        ?>
    </div>
    </div>
        <!--</span>-->
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
    
    <?= $form->field($model, 'amp') ?>
    
    <?php // $form->field($model, 'villcode') ?>
    
    <?= $form->field($model, 'kpi_result') ?>-->
    
        <!--<div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>-->
    
<?php ActiveForm::end(); ?> 

</div>
