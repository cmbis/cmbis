<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmbisAreaHosp */

$this->title = 'Create Cmbis Area Hosp';
$this->params['breadcrumbs'][] = ['label' => 'Cmbis Area Hosps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-area-hosp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
