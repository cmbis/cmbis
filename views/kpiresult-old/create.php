<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpiResult */

$this->title = 'Create Cmbis Kpi Result';
$this->params['breadcrumbs'][] = ['label' => 'Cmbis Kpi Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-kpi-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
