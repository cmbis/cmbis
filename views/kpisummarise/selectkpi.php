<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'สรุปผลงานและตรวจสอบกลุ่มเป้าหมาย', 'url' => ['kpisummarise/selectamp']];
$this->params['breadcrumbs'][] = 'ตรวจสอบกลุ่มเป้าหมาย';
// $this->title = 'DHDC-รายงานแพทย์แผนไทย';
?>


<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?=$sql ?></div>

    <?php
    if (isset($dataProvider)) {
        $dev = Html::a('สินสมุทร จันทร์ทอง', 'https://fb.com/sinsamoot', ['target' => '_blank']);
    ?>
        <!-- echo yii\grid\GridView::widget([  -->
            <?= GridView::widget([
        //echo \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            // 'responsive' => true,
            // 'hover' => true,
             // 'floatHeader' => true,
              'panel' => [
             //  'before' => '',
              'type' => \kartik\grid\GridView::TYPE_SUCCESS,
              'heading'=>'ตรวจสอบกลุ่มเป้าหมาย',
             //  'after' => 'โดย ' . $dev
              ], 
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'kpi_b_year',
                'header' => 'ปีงบประมาณ',
            ],
            [
                'attribute' => 'hcode',
                'header' => 'รหัสสถานบริการ',
            ],
            
            [
                'attribute' => 'kpi_id',
                'header' => 'รหัส',
            ],
            
            [
                'attribute' => 'kpi_name',
                'label' => 'ตัวชี้วัด',
                // 'format' => 'raw',
                // 'value' => function($model)  {
                //     return Html::a(Html::encode($model['ampurname']), [
                //                 'kpisummarise/selecthcode',
                //                 'ampurcodefull' => $model['ampurcodefull'],  

                //     ]);
                // }
            ],
            [
                'attribute' => 'kpi_target',
                'header' => 'เป้าหมาย',
            ],
            [
                'attribute' => 'kpi_result',
                'header' => 'ผลงาน',
            ],
            [
                'attribute' => 'kpi_percen_result',
                'header' => 'ร้อยละ',
            ],
            [
                'attribute' => 'kpi_score',
                'header' => 'คะแนน',
            ],
            [
                'attribute' => 'kpi_miss',
                'header' => 'ส่วนขาด',
                'format'=>'html',
                'value'=>function($model) {
                    $url = Url::to(['kpisummarise/kpiviewmiss','table'=>$model['kpi_function'],
                        'hcode'=>$model['hcode'],'kpi_b_year'=>$model['kpi_b_year'] ]);
                    return Html::a($model['kpi_miss'],$url);
                },
            ],
        ],
    ]);

    }
    ?>

<?php
$script = <<< JS
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
?>