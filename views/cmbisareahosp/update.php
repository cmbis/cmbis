<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisAreaHosp */

$this->title = 'Update Cmbis Area Hosp: ' . ' ' . $model->VID;
$this->params['breadcrumbs'][] = ['label' => 'Cmbis Area Hosps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->VID, 'url' => ['view', 'id' => $model->VID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cmbis-area-hosp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
