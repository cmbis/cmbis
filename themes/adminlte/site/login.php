<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CM</b>BIS</a>
    </div>

    <div class="row">
        <div class="login-box-body">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

                <?= $form->field($model, 'username',$fieldOptions1)->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password',$fieldOptions2)->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    ลืมรหัสผ่าน <?= Html::a('คลิก', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('ล็อกอิน', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            
            <?php ActiveForm::end(); ?>
        </div>
        <p class="login-box-msg"><?= Html::a('<i class="fa fa-user"></i> ลงทะเยียนใหม่', ['site/signup']) ?></p>
    </div>
</div>
