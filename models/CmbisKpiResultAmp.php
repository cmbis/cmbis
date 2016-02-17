<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_kpi_result_amp".
 *
 * @property integer $kpi_id
 * @property string $kpi_b_year
 * @property string $amp
 * @property integer $kpi_result
 * @property integer $kpi_target
 * @property integer $kpi_miss
 * @property double $kpi_percen_result
 * @property double $kpi_score
 */
class CmbisKpiResultAmp extends \yii\db\ActiveRecord
{
    //public $avgScore;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_kpi_result_amp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'kpi_b_year', 'amp'], 'required'],
            [['kpi_id', 'kpi_result', 'kpi_target', 'kpi_miss'], 'integer'],
            [['kpi_percen_result', 'kpi_score'], 'number'],
            [['kpi_b_year', 'amp'], 'string', 'max' => 4],
            //[['avgScore'],'decimal'=>2]
        ];
    }

    //หาผลรวม kpi_score
    public function getSumScore()
    {
        return $this
            ->hasMany(CmbisKpiResultAmp::className(), ['amp'=>'amp'])
            ->sum('kpi_score');
    }

    //หาค่าเฉลี่ยของ kpi_score
    public function getAvgScore()
    {
        return $this
            ->hasMany(CmbisKpiResultAmp::className(), ['amp'=>'amp'])
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
            'amp' => 'รหัสอำเภอ',
            'kpi_result' => 'ผลงาน',
            'kpi_target' => 'เป้าหมาย',
            'kpi_miss' => 'ส่วนขาด',
            'kpi_percen_result' => 'ร้อยละ',
            'kpi_score' => 'คะแนน',
            'amphur.Amp_Des' => 'อำเภอ',
            'avgScore'=>Yii::t('app','คะแนนเฉลี่ย'),
        ];
    }

    public function getAmphur()
    {
        return $this->hasOne(CmbisAreaHosp::className(),['AMP'=>'amp']);
    }
}
