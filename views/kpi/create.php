<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpi */

$this->title = 'สร้างตัวชี้วัดใหม่';
$this->params['breadcrumbs'][] = ['label' => 'จัดการตัวชี้วัด', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-create">

    <h1>กรอกรายละเอียดตัวชี้วัด</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
