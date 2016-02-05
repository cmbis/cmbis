<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\CmbisKpiResult;

$this->title = 'จัดอันดับหน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $f = ActiveForm::begin(['options' => ['class' => 'form-inline'], 'enableClientValidation' => false]); ?>
<?php
echo $f->field($Kpi, 'kpi_id')
        ->dropDownList($Kpilist, ['prompt' => '--เลือกตัวชี้วัดที่ต้องการแสดง--'], ['kpi_id', 'kpi_name'])
        ->label('เลือกตัวชี้วัด');
?>
<input type="submit" value="ตกลง" class="btn btn-primary" >
<?php ActiveForm::end(); ?>

    <?php if (!empty($kpi_id)): ?>
    <div class="alert alert-info overlay">
        <?php $sql = app\models\CmbisKpi::find()->where(['kpi_id' => $kpi_id])->all(); ?>
        ID = <?php echo $kpi_id; ?>
        <?php
        foreach ($sql as $rows) {
            echo $rows->kpi_name;  // แสดงข้อมูล field kpi_name
        }
        ?>
    </div>
    <div class="alert alert-success">
        <?php
        /*$query=CmbisKpiResult::find()->where(['kpi_id' => $kpi_id]);
        $dataProvider = new ActiveDataProvider([
          'query' =>$query,
          ]); 
        if (!empty($dataProvider)) {
            echo "OK!!";
        }
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'kpi_id',
                'kpi_b_year',
                'hcode',
                'villcode',
            //['class' => 'yii\grid\ActionColumn'],
            ],
        ]);*/
        $result = CmbisKpiResult::find()->where(['kpi_id' => $kpi_id])->all();?>
        <table border="2" width="100%">
            <tr align="center" heigth="50px"><td>รหัสตัวชี้วัด</td><td>ปี</td><td>รหัสสถานบริการ</td><td>ผลงาน</td></tr>
        <?php
        foreach ($result as $rows) {
            echo "<tr><td>".$rows->kpi_id . "</td>";
            echo "<td>".$rows->kpi_b_year . "</td>";
            echo "<td>".$rows->hcode . "</td>";
            echo "<td>".$rows->kpi_percen_result."</td></tr>";
        }
        ?>
        </table>
    </div>
<?php endif; ?>
