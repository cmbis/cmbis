<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CmbisAreaHosp */

$this->title = $model->VID;
$this->params['breadcrumbs'][] = ['label' => 'Cmbis Area Hosps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cmbis-area-hosp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->VID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->VID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'VID',
            'AREA_NAME',
            'Hosp',
            'Hosp_des',
            'AMP',
            'Amp_Des',
            'TUM',
            'Tum_des',
            'CHK',
            'No_Count',
            'Remark',
            'CUP',
            'Benchmark',
        ],
    ]) ?>

</div>
