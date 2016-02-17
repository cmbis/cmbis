<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use app\models\CmbisKpiResultAmp;
use yii\data\ActiveDataProvider;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
$this->registerJsFile('./js/chart_dial.js');
$this->title = 'CMBIS : ChiangMai Benchmark Information System';

$sum_result1=Yii::$app->db->createCommand('
    SELECT sum(kpi_result) FROM cmbis_kpi_result_amp WHERE kpi_id=:kpi_id
', [':kpi_id' => 1])->queryScalar();

$sum_target1=Yii::$app->db->createCommand('
    SELECT sum(kpi_target) FROM cmbis_kpi_result_amp WHERE kpi_id=:kpi_id
', [':kpi_id' => 1])->queryScalar();

$sum_result2=Yii::$app->db->createCommand('
    SELECT sum(kpi_result) FROM cmbis_kpi_result_amp WHERE kpi_id=:kpi_id
', [':kpi_id' => 2])->queryScalar();

$sum_target2=Yii::$app->db->createCommand('
    SELECT sum(kpi_target) FROM cmbis_kpi_result_amp WHERE kpi_id=:kpi_id
', [':kpi_id' => 2])->queryScalar();

$sum_result3=Yii::$app->db->createCommand('
    SELECT sum(kpi_result) FROM cmbis_kpi_result_amp WHERE kpi_id=:kpi_id
', [':kpi_id' => 3])->queryScalar();

$sum_target3=Yii::$app->db->createCommand('
    SELECT sum(kpi_target) FROM cmbis_kpi_result_amp WHERE kpi_id=:kpi_id
', [':kpi_id' => 3])->queryScalar();


?>

<div class="site-index">
    <div class="info-box">
      <!-- Apply any bg-* class to to the icon to color it -->
      <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
      <div class="info-box-content">
        <p class="lead">ระบบสารสนเทศเปรียบเทียบเพื่อการประเมินประสิทธิผลการปฏิบัติงาน</p>
        <p><?= $this->title;?></p>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->

<!--     <div class="jumbotron list-group-item list-group-item-success">
        <h1>ยินดีต้อนรับ</h1>

        <p class="lead">ระบบสารสนเทศเปรียบเทียบเพื่อการประเมินประสิทธิผลการปฏิบัติงาน</p>
        <p><?= $this->title;?></p>
    </div> -->
</div>

<?php
$dataProvider = new ActiveDataProvider([
            'query' => CmbisKpiResultAmp::find()->select('*,avg(kpi_score) as avgScore')->groupBy('amp')->orderBy('avgScore DESC'),
            'sort' => [
                'defaultOrder' => [
                   'kpi_score' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
?>

<?php
    $sql="SELECT *, round(avg(kpi_score),2) as avgScore FROM cmbis_kpi_result_amp INNER JOIN cmbis_area_hosp ON cmbis_area_hosp.AMP=cmbis_kpi_result_amp.amp GROUP BY cmbis_kpi_result_amp.amp ORDER BY avgScore DESC LIMIT 5";
    $rawData = Yii::$app->db->createCommand($sql)->queryAll();
    $main_data = [];
    $main_name = [];
    foreach ($rawData as $data) {
        $main_name[] = $data['Amp_Des'];
        $main_data[] = [
            $data['avgScore']*1
        ];
    }
    $score = json_encode($main_data);
    $name = json_encode($main_name);
    //echo $score."<br/>";
    //echo $name;
?>

<div class="body-content">

<div class="box box-warning collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-refresh fa-spin"></i> แสดง 5 อันดับคะแนน</h3>
    <span class="label label-danger">Update</span>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
      <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">

<?php yii\widgets\Pjax::begin(['id' => 'grid-index-pjax','timeout'=>5000]) ?>
<?php
echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'showFooter'=>true,
        'resizableColumns'=>true,
        //'showPageSummary' => true,
        'tableOptions' => [
          'class' => 'table table-bordered  table-striped table-hover',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_WARNING,
            'heading'=> false,
            'after' => '<a href="./index.php/kpiresult/scoreampur" target="_blank">ดูเพิ่มเติม...</a>',
            'footer'=>false
        ],
        'toolbar' => [
            //'{export}',
            //'{toggleData}'
        ],
        'columns' => [
            ['class'=>'kartik\grid\SerialColumn'],
            //'kpi_id',
            'amp'=>[
                'attribute' => 'รหัสอำเภอ',
                'value' => 'amp'
            ],
            'amphur.Amp_Des',
            //'kpi_target',
            //'kpi_result',
            'avgScore' => [
                'attribute' => 'คะแนนเฉลี่ย',
                'format' => ['decimal',2],
                'value' => 'avgScore'
            ]
        ],
        'pager' => [
            'firstPageLabel' => 'หน้าแรก',
            'lastPageLabel' => 'หน้าสุดท้าย',
        ],
        //'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
    ]);

?>
<?php yii\widgets\Pjax::end() ?>

  </div><!-- /.box-body -->
</div><!-- /.box -->
<div class="chart1" style="min-width: 220px; height: 410px; margin: 5 auto; text-align: center;">
<?php
echo Highcharts::widget([
    'options'=>'{
      "chart": {"type": "column"},
      "title": { "text": "แผนภูมิจัดอันดับคะแนน 5 ลำดับแรก" },
      "xAxis": {
         "categories": '.$name.',
         "type": "category"
      },
      "yAxis": {
         "title": { "text": "คะแนนเฉลี่ย" },
         "min": 0,
         "max": 10
      },
      "legend": {
            "enabled": false
        },
      "series": [{"colorByPoint": true,"name" : "คะแนนเฉลี่ย","data":'.$score.'}],
      "credits" : {"enabled" : false}
    }'
]);

?>
</div>



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
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>ก่อน 12 สัปดาห์</h4></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <div id="ch1"></div>
            <br/><button class="btn btn-danger" >งวดที่ 1 (ตุลาคม-ธันวาคม 2558)</button>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
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
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><h4>หญิงตั้งครรภ์ได้รับการฝากครรภ์ <br>ครบ 5 ครั้ง</h4></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <div id="ch2"></div>
                <br/><button class="btn btn-success" >งวดที่ 1 (ตุลาคม-ธันวาคม 2558)</button>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
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
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><h4>เด็กแรกเกิด-ต่ำกว่า 6 เดือน กินนมแม่<br>อย่างเดียว </h4></h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <div id="ch3"></div>
                <br/><button class="btn btn-danger" >งวดที่ 1 (ตุลาคม-ธันวาคม 2558)</button>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!-- End Chart -->
    </div>
</div>
