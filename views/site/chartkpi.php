<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;

$this->title = 'แผนภูมิแท่งเปรียบเทียบตัวชี้วัด';
?>
<div class='well'>
    <form method="GET">
        <div class='col-sm-1'>
        <span class='badge btn-success' style="padding: 5px"> เลือกตัวชี้วัด : </span>
        </div>
        <div class='row'>

            <div class='col-sm-5'>
               <?php
                $result = ArrayHelper::map(app\models\CmbisKpi::find()->where(['between','kpi_id', '1', '15'])->all(), 'kpi_id', 'kpi_name');
                echo Html::dropDownList('kpi', $kpi, $result,[
                    'class' => 'form-control', 'prompt'=>'เลือกตัวชี้วัด'
                ]);
                ?>
            </div>
            <div class='col-sm-2'>

                <button class='btn btn-danger'>ประมวลผล</button>
            </div>
        </div>
    </form>
</div>
<div style="display: none">
    <?php
    echo Highcharts::widget([
        'scripts' => [
            'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
            //'modules/exporting', // adds Exporting button/menu to chart
            //'themes/grid',       // applies global 'grid' theme to all charts
            //'highcharts-3d',
            'modules/drilldown'
        ]
    ]);
    ?>
</div>


<div id="chart1" style="min-width: 220px; height: 410px; margin: 5 auto; text-align: center;"></div>

<?php
$this->registerJs("$(function () {
    $('#chart1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'แผนภูมิแท่งเปรียบเทียบตัวชี้วัด'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    'fontSize': '10px',
                    'fontFamily': 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            title: {
                text: '<b>ร้อยละ</b>'
            },
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [
        {
            name: 'อำเภอ',
            colorByPoint: true,
            data:$main
            
        }
        ],
        drilldown: {
            series:[
            	{'id':'5001','name':'อำเภอเมือง','data':$sub_a5001},
            	{'id':'5002','name':'อำเภอจอมทอง','data':$sub_a5002},
            	{'id':'5003','name':'อำเภอแม่แจ่ม','data':$sub_a5003},
            	{'id':'5004','name':'อำเภอเชียงดาว','data':$sub_a5004},
            	{'id':'5005','name':'อำเภอดอยสะเก็ด','data':$sub_a5005},
            	{'id':'5006','name':'อำเภอแม่แตง','data':$sub_a5006},
            	{'id':'5007','name':'อำเภอแม่ริม','data':$sub_a5007},
            	{'id':'5008','name':'อำเภอสะเมิง','data':$sub_a5008},
            	{'id':'5009','name':'อำเภอฝาง','data':$sub_a5009},
            	{'id':'5010','name':'อำเภอแม่อาย','data':$sub_a5010},
            	{'id':'5011','name':'อำเภอพร้าว','data':$sub_a5011},
            	{'id':'5012','name':'อำเภอสันป่าตอง','data':$sub_a5012},
            	{'id':'5013','name':'อำเภอสันกำแพง','data':$sub_a5013},
            	{'id':'5014','name':'อำเภอสันทราย','data':$sub_a5014},
            	{'id':'5015','name':'อำเภอหางดง','data':$sub_a5015},
            	{'id':'5016','name':'อำเภอฮอด','data':$sub_a5016},
            	{'id':'5017','name':'อำเภอดอยเต่า','data':$sub_a5017},
            	{'id':'5018','name':'อำเภออมก๋อย','data':$sub_a5018},
            	{'id':'5019','name':'อำเภอสารภี','data':$sub_a5019},
            	{'id':'5020','name':'อำเภอเวียงแหง','data':$sub_a5020},
            	{'id':'5021','name':'อำเภอไชยปราการ','data':$sub_a5021},
            	{'id':'5022','name':'อำเภอแม่วาง','data':$sub_a5022},
            	{'id':'5023','name':'อำเภอแม่ออน','data':$sub_a5023},
            	{'id':'5024','name':'อำเภอดอยหล่อ','data':$sub_a5024},
            	{'id':'5025','name':'อำเภอกัลยาณิวัฒนา','data':$sub_a5025},
            ]
            
        },
        credits : {enabled : false}
    });
});", yii\web\View::POS_END);
?>