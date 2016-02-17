<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_kpi_result_hcode".
 *
 * @property integer $kpi_id
 * @property string $kpi_b_year
 * @property string $hcode
 * @property integer $kpi_result
 * @property integer $kpi_target
 * @property integer $kpi_miss
 * @property double $kpi_percen_result
 * @property double $kpi_score
 */
class CmbisKpiResultHcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_kpi_result_hcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'kpi_b_year', 'hcode'], 'required'],
            [['kpi_id', 'kpi_result', 'kpi_target', 'kpi_miss'], 'integer'],
            [['kpi_percen_result', 'kpi_score'], 'number'],
            [['avgScore'], 'double'],
            [['kpi_b_year'], 'string', 'max' => 4],
            [['hcode'], 'string', 'max' => 5]
        ];
    }

    //หาค่าเฉลี่ยของ kpi_score
    public function getAvgScore()
    {
        return $this
            ->hasMany(CmbisKpiResultHcode::className(), ['hcode'=>'hcode'])
            ->average('kpi_score');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kpi_id' => 'Kpi ID',
            'kpi_b_year' => 'Kpi B Year',
            'hcode' => 'รหัสสถานบริการ',
            'kpi_result' => 'Kpi Result',
            'kpi_target' => 'Kpi Target',
            'kpi_miss' => 'Kpi Miss',
            'kpi_percen_result' => 'Kpi Percen Result',
            'kpi_score' => 'Kpi Score',
            'hoscode.hosname2' => 'สถานบริการ',
            'amphur.Amp_Des' => 'อำเภอ',
            'avgScore'=>Yii::t('app','คะแนนเฉลี่ย'),
        ];
    }

    public function getHoscode()
    {
        return $this->hasOne(Chospital::className(),['hoscode'=>'hcode']);
    }

    public function getAmphur()
    {
        return $this->hasOne(CmbisAreaHosp::className(),['Hosp'=>'hcode']);
    }
}
