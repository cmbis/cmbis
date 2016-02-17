<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\models\CmbisYear;

$this->params['breadcrumbs'][] = ['label' => 'สรุปผลงานและตรวจสอบกลุ่มเป้าหมาย', 'url' => ['kpisummarise/selectamp']];
$this->params['breadcrumbs'][] = 'เปรียบเทียบระดับอำเภอ';
// $this->title = 'DHDC-รายงานแพทย์แผนไทย';
?>


<a href="#" id="btn_sql">ชุดคำสั่ง</a>
<div id="sql" style="display: none"><?=$sql ?></div>

    <?php
    if (isset($dataProvider)) {
        $dev = Html::a('สินสมุทร จันทร์ทอง', 'https://fb.com/sinsamoot', ['target' => '_blank']);
?>

<div class='well'>
    <form method="POST">
        <div class='col-sm-1'>
            <button class='btn btn-default'>ปีงบประมาณ</button>
        </div>
        <div class='row'>

            <div class='col-sm-2'>
                <?php
                 $list_year =  [
                    '2557' => '2557',
                    '2558' => '2558',
                    '2559' => '2559',
                    '2560' => '2560'];            
                echo Html::dropDownList('selyear', $selyear, $list_year,[
                    'class' => 'form-control'
                    // , 'prompt'=>'เลือก'
                ]);
                ?>
            </div>
            <div class='col-sm-2'>

                <button class='btn btn-danger'>ประมวลผล</button>
            </div>
        </div>
    </form>
</div>
<!-- <?php echo $selyear; ?> -->
        <!-- echo GridView::widget -->
        <?= GridView::widget([
                // echo \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            // 'responsive' => true,
            // 'hover' => true,
             // 'floatHeader' => true,
              'panel' => [
                  // 'before' => '',
                  'type' => \kartik\grid\GridView::TYPE_SUCCESS,
                  'heading'=>'เปรียบเทียบระดับอำเภอ',
             //  'after' => 'โดย ' . $dev
              ], 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'kpi_b_year',
                'header' => 'ปีงบประมาณ',
            ],
            [
                'attribute' => 'amp',
                'header' => 'รหัส',
            ],
            
            [
                'attribute' => 'Amp_Des',
                'label' => 'อำเภอ',
                'format' => 'raw',
                'value' => function($model)  {
                    return Html::a(Html::encode($model['Amp_Des']), [
                                'kpisummarise/selecthcode',
                                'amp' => $model['amp'],  
                                // 'ampurcodefull' => $model['ampurcodefull'], 

                    ]);
                }
            ],
            [
                'attribute' => 'percen',
                'header' => 'ร้อยละ',
                'format' => ['decimal',2]
            ],
            [
                'attribute' => 'score',
                'header' => 'คะแนน',
                'format'=>['decimal',2]
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