<?php

namespace app\controllers;

use yii;

class KpisummariseController extends \yii\web\Controller {

   
    public $enableCsrfValidation = false; 

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSelectamp() {
        $selyear = date('Y')+543;

        if (!empty($_POST['selyear'])) {
            $selyear = $_POST['selyear'];
        }
        // $dataList = '';
        $sql = " SELECT ra.kpi_b_year,ra.amp, ah.Amp_Des, avg(ra.kpi_percen_result) as percen, 
            avg(ra.kpi_score) as score
            FROM cmbis_kpi_result_amp ra
            INNER JOIN cmbis_area_hosp ah ON ra.amp = ah.AMP
            where ra.kpi_b_year = $selyear
            GROUP BY ra.amp order by score DESC,percen DESC";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);

        return $this->render('selectamp', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'selyear' => $selyear,
        ]);
    }


    public function actionSelecthcode($amp=null) { 
        $selyear = date('Y')+543;

        if (!empty($_POST['selyear'])) {
            $selyear = $_POST['selyear'];
        }

        // $selyear = '2014-04-01', $date2 = '2015-04-02') {

        // $role = isset(Yii::$app->user->identity->role) ? Yii::$app->user->identity->role : 99;
        // if ($role == 99) {
        //     throw new \yii\web\ConflictHttpException('ไม่อนุญาต');
        // }
        $sql = " SELECT rh.kpi_b_year,
                rh.hcode,
                ah.Hosp_des,
                ah.AMP,
                ah.Tum_des,
                round(avg(rh.kpi_percen_result),2) AS percen,
                round(avg(rh.kpi_score),2) AS score
            FROM
                cmbis_kpi_result_hcode rh
            LEFT JOIN cmbis_area_hosp ah ON rh.hcode = ah.Hosp
            where ah.amp=$amp and rh.kpi_b_year=$selyear
            GROUP BY
                rh.hcode
            order by score DESC,percen DESC    
            ";

        $sql1 = " SELECT rh.kpi_b_year,
                rh.hcode,
                ah.Hosp_des,
                ah.AMP,
                ah.Tum_des,
                ah.TUM,
                round(avg(rh.kpi_percen_result),2) AS percen,
                round(avg(rh.kpi_score),2) AS score
            FROM
                cmbis_kpi_result_hcode rh
            LEFT JOIN cmbis_area_hosp ah ON rh.hcode = ah.Hosp
            where ah.AMP=$amp and rh.kpi_b_year=$selyear
            GROUP BY ah.TUM
            order by score DESC,percen DESC    
            ";
 

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
            // $rawData1 = \Yii::$app->db->createCommand($sql1)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }

        try {
            $rawData1 = \Yii::$app->db->createCommand($sql1)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }

        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);

        $dataProvider1 = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData1,
            'pagination' => FALSE,
        ]);

        return $this->render('selecthcode', [
                    'dataProvider' => $dataProvider,
                   'dataProvider1'=>$dataProvider1,
                    'rawData' => $rawData,
                    'rawData1' => $rawData1,
                    'sql' => $sql,
                    'sql1'=>$sql1,
                    'amp'=>$amp,
                    'selyear'=>$selyear
        ]);
    }

    public function actionSelectkpi($hcode=null,$kpi_function=null) { 
        $selyear = date('Y')+543;

        if (!empty($_POST['selyear'])) {
            $selyear = $_POST['selyear'];
        }

        $sql = " SELECT
        rh.hcode,
        rh.kpi_b_year,
    rh.kpi_id,
    k.kpi_name,
    rh.kpi_target,
    rh.kpi_result,
    rh.kpi_percen_result,
    rh.kpi_score,
    rh.kpi_miss,
    k.kpi_function
    -- round(avg(rh.kpi_percen_result),2) AS percen,
    -- round(avg(rh.kpi_score),2) AS score
FROM
    cmbis_kpi_result_hcode rh
INNER JOIN cmbis_kpi k ON rh.kpi_id = k.kpi_id
where rh.hcode=$hcode and rh.kpi_b_year=$selyear
GROUP BY rh.kpi_id ORDER BY rh.kpi_score DESC, rh.kpi_percen_result DESC
";

        // echo $sql;
        //$rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        //print_r($rawData);
        //return;

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }

        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);

        return $this->render('selectkpi', [
                    'dataProvider' => $dataProvider,
                    // 'rawData' => $rawData,
                    'sql' => $sql,
                    'hcode'=>$hcode,
                    'kpi_function'=>$kpi_function,
                    'selyear'=>$selyear

        ]);
    }

    

    public function actionKpiviewmiss()

    {
        return $this->render('kpiviewmiss', [
            ]);
    }
}



//จบ controller
