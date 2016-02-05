<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_kpi_result".
 *
 * @property integer $kpi_id
 * @property string $kpi_b_year
 * @property string $hcode
 * @property string $villcode
 * @property integer $kpi_result
 * @property integer $kpi_target
 * @property integer $kpi_miss
 * @property double $kpi_percen_result
 * @property double $kpi_score
 */
class CmbisKpiResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_kpi_results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'kpi_b_year', 'hcode', 'villcode'], 'required'],
            [['kpi_id', 'kpi_result', 'kpi_target', 'kpi_miss'], 'integer'],
            [['kpi_percen_result', 'kpi_score'], 'number'],
            [['kpi_b_year'], 'string', 'max' => 4],
            [['hcode'], 'string', 'max' => 5],
            [['villcode'], 'string', 'max' => 8]
        ];
    }
    //หาผลรวมของ kpi_result
    public function getSumResult()
    {
        return $this
            ->hasMany(CmbisKpiResult::className(), ['hcode'=>'hcode','kpi_id'=>'kpi_id'])
            ->sum('kpi_result');
    }
    
    //หาผลรวมของ kpi_target
    public function getSumTarget()
    {
        return $this
            ->hasMany(CmbisKpiResult::className(), ['hcode'=>'hcode','kpi_id'=>'kpi_id'])
            ->sum('kpi_target');
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kpi_id' => 'Kpi ID',
            'kpi_b_year' => 'ปี',
            'hcode' => 'สถานบริการ',
            'villcode' => 'หมู่',
            'kpi_result' => 'ผลงาน',
            'kpi_target' => 'เป้าหมาย',
            'kpi_miss' => 'Kpi Miss',
            'kpi_percen_result' => '%',
            'kpi_score' => 'คะแนน',
            'sumResult'=>Yii::t('app', 'ผลงาน'),
            'sumTarget'=>Yii::t('app', 'เป้าหมาย'),
            'percen'=>Yii::t('app', '%')
        ];
    }

    public function getHoscode()
    {
        return $this->hasOne(Chospital::className(),['hoscode'=>'hcode']);
    }

    public function getAmpurcode()
    {
        return $this->hasOne(Campur::className(),['ampurcodefull'=>'villcode']);
    }
}
