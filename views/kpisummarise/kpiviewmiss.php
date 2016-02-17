<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\data\SqlDataProvider;

$this->params['breadcrumbs'][] = ['label' => 'สรุปผลงานตัวชี้วัด', 'url' => ['kpisummarise/selectkpi']];
$this->params['breadcrumbs'][] = 'รายสถานบริการ';

/* @var $this yii\web\View */
/* @var $model app\models\CmbisKpi */
$this->title='Table';
?>
<br>
<?php
    if((!Yii::$app->user->isGuest && $_GET['hcode']==Yii::$app->user->identity->captcha)||Yii::$app->user->identity->isAdmin){
        //echo Yii::$app->user->identity->captcha;
?>

<div class="cmbis-kpi-view">

<?php
    //echo "Show Table <b>".$_GET['table']."</b>";
    $sql='SELECT count(*) FROM '.$_GET['table']. ' WHERE HOSPCODE = '.$_GET['hcode'] .'
        and pass = "N" and b_year = '. $_GET['kpi_b_year'] ;
    $count = Yii::$app->db->createCommand($sql)->queryScalar();
    //echo $count;

    $dataProvider = new SqlDataProvider([
    'sql' => 'SELECT *, right(vhid,2) as mu, ah.Tum_des, pn.prename,
        TIMESTAMPDIFF(YEAR,'. $_GET['table'].'.BIRTH'.',NOW()) as age 
         FROM '.$_GET['table']. 
        ' INNER JOIN cmbis_area_hosp ah ON ah.VID = '. $_GET['table'].'.vhid'.
        ' INNER JOIN cprename pn ON pn.id_prename = '. $_GET['table'].'.PRENAME'.
         ' WHERE HOSPCODE = '.$_GET['hcode'] .'
        and pass = "N" and b_year = '. $_GET['kpi_b_year'] ,
    'pagination' => [
        'pageSize' => 10,
    ],
    'totalCount' => $count
    //'params' => [':kpi_id' => '$kpi_id'],
]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'showFooter'=>true,
        'showPageSummary' => false,
        'tableOptions' => [
          'class' => 'table table-bordered  table-striped table-hover',
        ],
        'panel'=>[
            'type'=>GridView::TYPE_DANGER,
            'heading'=>'รายชื่อกลุ่มเป้าหมายที่ต้องติดตาม',
        ],
        'columns' => [
            ['class'=>'kartik\grid\SerialColumn'],
            [
                'attribute' => 'b_year',
                'header' => 'ปีงบประมาณ',
            ],
            [
                'attribute' => 'HOSPCODE',
                'header' => 'รหัสสถานบริการ',
            ],
            [
                'attribute' => 'CID',
                'header' => 'เลขบัตรประชาชน',
            ],
            [
                'attribute' => 'prename',
                'header' => '-',
            ],
            [
                'attribute' => 'NAME',
                'header' => 'ชื่อ',
            ],
            [
                'attribute' => 'LNAME',
                'header' => 'สกุล',
            ],
            [
                'attribute' => 'age',
                'header' => 'อายุ',
            ],
            [
                'attribute' => 'mu',
                'header' => 'หมู่',
            ],
            [
                'attribute' => 'Tum_des',
                'header' => 'ตำบล',
            ],
        ],
        'pager' => [
            'firstPageLabel' => 'หน้าแรก',
            'lastPageLabel' => 'หน้าสุดท้าย',
        ],
        //'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
    ]);

?>

</div>
<?php
    } else {
?>
    <div class="alert alert-danger"><b>ขออภัย!! สำหรับสถานบริการที่ Login ของตนเองเท่านั้น!!!</b></div>
<?php
    }
?>