<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dektrium\user\widgets\Connect;
/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>


<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CM</b>BIS</a>
        
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        
    <div class="row">
   
<!--        <div class="panel panel-primary">-->
<!--            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) .' CMBIS'?></h3>
            </div>
            -->
            <div class="panel-body">
                
                <?php $form = ActiveForm::begin([
                    'id'                     => 'login-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                    'validateOnType'         => false,
                    'validateOnChange'       => false,
                ]) ?>
                
                <?= $form->field($model, 'login',
                        ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1'],
                           
                            ]) 
                        ->textInput(['placeholder' => $model->getAttributeLabel('Username')])
                        ->label('ชื่อผู้ใช้งาน')?> 

                <?= $form->field($model, 'password',
                        ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
                        
                        ->passwordInput()->label(Yii::t('user', 'Password') . 
                                ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'),
                                        ['recovery/request'], ['tabindex' => '5']) . ')' : ''))
                        ->passwordInput(['placeholder' => $model->getAttributeLabel('Password')])?>

                <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>
                
      
                

                <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>

                <?php ActiveForm::end(); ?>
        
        </div>
        <?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['registration/resend']) ?>
            </p>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['registration/register']) ?>
            </p>
        <?php endif ?>
        <?= Connect::widget([
            'baseAuthUrl' => ['security/auth']
        ]) ?>
    </div>
         
                  
       
   


</div>
