<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อเจ้าหน้าที่ทั้งหมด';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="page-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <?php //echo $this->render('_search', ['model' => $searchModel]);    ?>
<?php
$data = ArrayHelper::map(\app\models\Groups::find()->all(), 'name', 'name');
?>
<?= Html::dropDownList('groups', null, $data,['prompt'=>'- select group -','onchange'=>'
    $.pjax.reload({
        url: "'.Url::to(['index2']).'?UserSearch[group_id]="+$(this).val(),
        container: "#pjax-gridview",
        timeout: 1000,
    });
','class'=>'form-control']) ?><p>
    <?php Pjax::begin(['id' => 'pjax-gridview']) ?>

    <?=
    GridView::widget([
        'id' => 'user-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'pjax' => true, // pjax is set to always true for this demo
        //'showPageSummary' => true,
        'exportConfig' => true,
        'floatHeader' => true,
        'hover'=>true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . $this->title . '</h3>',
            'before' => '<div style="padding-top: 7px;"><em>* The table at the right you can pull reports</em></div>',
        ],
        // set your toolbar
        'toolbar' => [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['user/create'], ['type' => 'button', 'title' => 'Add ' . $this->title, 'class' => 'btn btn-success']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['user/index2'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
            ],
            '{export}',
        //'{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            //'id',
           // 'username',
            'name',
            //'email',
            'phone',
            'city',
            
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'vAlign' => 'middle',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['style'=>'width:120px;'],
                'template'=>'<div class="btn-group btn-group-sm" role="group" aria-label="...">{view}{update}{delete}</div>',
                'buttons'=>[
                    'view'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-eye-open"></i>',$url,['class'=>'btn btn-default']);
                    }, 
                    'update'=>function($url,$model,$key){
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',$url,['class'=>'btn btn-default']);
                    },
                    'delete'=>function($url,$model,$key){
                         return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url,[
                                'title' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'คุณต้องการลบไฟล์นี้?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class'=>'btn btn-default'
                                ]);
                    }
                ]
            ],
            ['class' => 'kartik\grid\CheckboxColumn']
        // 'email:email',
        // 'phone',
        // 'city',
        // 'role',
        // 'status',
        // 'name',
        // 'avatar',
        // 'banner_top',
        // 'params:ntext',
        // 'position',
        // 'hobby',
        // 'description:ntext',
        // 'created_at',
        // 'updated_at',
        // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
<?php Pjax::end() ?>
</div>
