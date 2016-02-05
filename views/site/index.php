<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */
$this->registerJsFile('./js/chart_dial.js');
$this->title = 'CMBIS : ChiangMai Benchmark Information System';

$sum_result1=Yii::$app->db->createCommand('
    SELECT sum(kpi_result) FROM cmbis_kpi_result WHERE kpi_id=:kpi_id
', [':kpi_id' => 1])->queryScalar();

$sum_target1=Yii::$app->db->createCommand('
    SELECT sum(kpi_target) FROM cmbis_kpi_result WHERE kpi_id=:kpi_id
', [':kpi_id' => 1])->queryScalar();

$sum_result2=Yii::$app->db->createCommand('
    SELECT sum(kpi_result) FROM cmbis_kpi_result WHERE kpi_id=:kpi_id
', [':kpi_id' => 2])->queryScalar();

$sum_target2=Yii::$app->db->createCommand('
    SELECT sum(kpi_target) FROM cmbis_kpi_result WHERE kpi_id=:kpi_id
', [':kpi_id' => 2])->queryScalar();

$sum_result3=Yii::$app->db->createCommand('
    SELECT sum(kpi_result) FROM cmbis_kpi_result WHERE kpi_id=:kpi_id
', [':kpi_id' => 3])->queryScalar();

$sum_target3=Yii::$app->db->createCommand('
    SELECT sum(kpi_target) FROM cmbis_kpi_result WHERE kpi_id=:kpi_id
', [':kpi_id' => 3])->queryScalar();


?>

<div class="site-index">

    <div class="jumbotron list-group-item list-group-item-success">
        <h1>ยินดีต้อนรับ</h1>

        <p class="lead">ระบบสารสนเทศเปรียบเทียบเพื่อการประเมินประสิทธิผลการปฏิบัติงาน</p>
        <p><?= $this->title;?></p>
    </div>
</div>

<div class="body-content">

    <div class="chart" style='display: none'>  
        <?=
        Highcharts::widget([
            'scripts' => [
                'highcharts-more',
                'themes/grid'
            //'modules/exporting',
            ],
        ]);
        ?>
    </div>

    <div class="row">
        <div class="col-sm-4" style="text-align: center;">
            <?php
            $target = $sum_target1;
            $result = $sum_result1;
            $persent = 0.00;
            if ($target > 0) {
                $persent = $result / $target * 100;
                $persent = number_format($persent, 2);
            }
            $base = 60;
            $this->registerJs("
                        var obj_div=$('#ch1');
                        gen_dial(obj_div,$base,$persent);
                    ");
            ?>
            <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>ก่อน 12 สัปดาห์</h4>
            <div id="ch1"></div>
        </div>
        <div class="col-sm-4" style="text-align: center;">
            <?php
            $target = $sum_target2;
            $result = $sum_result2;
            $persent = 0.00;
            if ($target > 0) {
                $persent = $result / $target * 100;
                $persent = number_format($persent, 2);
            }
            $base = 60;
            $this->registerJs("
                        var obj_div=$('#ch2');
                        gen_dial(obj_div,$base,$persent);
                    ");
            ?>
            <h4>หญิงตั้งครรภ์ได้รับการฝากครรภ์ <br>ครบ 5 ครั้ง</h4>
            <div id="ch2"></div>

        </div>

        <div class="col-sm-4" style="text-align: center;">
            <?php
            $target = $sum_target3;
            $result = $sum_result3;
            $persent = 0.00;
            if ($target > 0) {
                $persent = $result / $target * 100;
                $persent = number_format($persent, 2);
            }
            $base = 50;
            $this->registerJs("
                        var obj_div=$('#ch3');
                        gen_dial(obj_div,$base,$persent);
                    ");
            ?>
            <h4>เด็กแรกเกิด-ต่ำกว่า 6 เดือน กินนมแม่<br>อย่างเดียว </h4>
            <div id="ch3"></div>
        </div>
    </div>
</div>
