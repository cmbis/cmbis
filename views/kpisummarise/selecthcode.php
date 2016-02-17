<?php
use yii\helpers\Html;
use kartik\grid\GridView;

$this->params['breadcrumbs'][] = ['label' => 'สรุปผลงานและตรวจสอบกลุ่มเป้าหมาย', 'url' => ['kpisummarise/selectamp']];
$this->params['breadcrumbs'][] = 'เปรียบเทียบระดับสถานบริการ/ตำบล';
// $this->title = 'DHDC-รายงานแพทย์แผนไทย';
?>


<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?=$sql ?></div>


    <?php
    if (isset($dataProvider)) {
        $dev = Html::a('สินสมุทร จันทร์ทอง', 'https://fb.com/sinsamoot', ['target' => '_blank']);
    ?>
         <!-- echo yii\grid\GridView::widget([ -->
        <?= GridView::widget([
        //echo \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            // 'responsive' => true,
            // 'hover' => true,
             // 'floatHeader' => true,
              'panel' => [
             //  'before' => '',
              'type' => \kartik\grid\GridView::TYPE_SUCCESS,
              'heading'=>'เปรียบเทียบระดับสถานบริการ',
             //  'after' => 'โดย ' . $dev
              ], 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'kpi_b_year',
                'header' => 'ปีงบประมาณ',
            ],
            [
                'attribute' => 'hcode',
                'header' => 'รหัส',
            ],

            [
                'attribute' => 'Hosp_des',
                'label' => 'สถานบริการ',
                'format' => 'raw',
                'value' => function($model)  {
                    return Html::a(Html::encode($model['Hosp_des']), [
                                'kpisummarise/selectkpi',
                                'hcode' => $model['hcode'],  

                    ]);
                }
            ],
            [
                'attribute' => 'Tum_des',
                'header' => 'ตำบล',
            ],
            [
                'attribute' => 'percen',
                'header' => 'ร้อยละ',
            ],
            [
                'attribute' => 'score',
                'header' => 'คะแนน',
            ],
        ],
    ]);

    }
    ?>

    
     <?= GridView::widget([
        //echo \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider1,
            // 'responsive' => true,
            // 'hover' => true,
             // 'floatHeader' => true,
              'panel' => [
             //  'before' => '',
              'type' => \kartik\grid\GridView::TYPE_SUCCESS,
              'heading'=>'เปรียบเทียบระดับตำบล',
             //  'after' => 'โดย ' . $dev
              ], 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'kpi_b_year',
                'header' => 'ปีงบประมาณ',
            ],
            [
                'attribute' => 'TUM',
                'header' => 'รหัส',
            ],

            // [
            //     'attribute' => 'Amp_Des',
            //     'label' => 'ตำบล',
                // 'format' => 'raw',
                // 'value' => function($model)  {
                //     return Html::a(Html::encode($model['Hosp_des']), [
                //                 'kpisummarise/selectkpi',
                //                 'hcode' => $model['hcode'],  

                //     ]);
                // }
            // ],
            [
                'attribute' => 'Tum_des',
                'header' => 'ตำบล',
                // 'format' => 'raw',
                // 'value' => function($model)  {
                //     return Html::a(Html::encode($model['Tum_des']), [
                //                 'kpisummarise/selectkpi1',
                //                 'TUM' => $model['TUM'],  

                //     ]);
                // }
            ],
            [
                'attribute' => 'percen',
                'header' => 'ร้อยละ',
            ],
            [
                'attribute' => 'score',
                'header' => 'คะแนน',
            ],
        ],
    ]);

    ?>

<?php
$script = <<< JS
$('#btn_sql').on('click', function(e) {
    
   $('#sql').toggle();
});
JS;
$this->registerJs($script);
?>