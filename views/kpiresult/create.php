<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResult */

$this->title = 'เพิ่มตัวชี้วัด';
$this->params['breadcrumbs'][] = ['label' => 'ผลงานตามตัวชี้วัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-result-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
