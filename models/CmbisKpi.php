<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_kpi".
 *
 * @property integer $kpi_id
 * @property string $kpi_name
 * @property string $kpi_b_year
 * @property string $kpi_function
 * @property integer $kpi_percent_target
 * @property string $kpi_desc
 * @property integer $kpi_group
 */
class CmbisKpi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_kpi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kpi_id', 'kpi_b_year'], 'required'],
            [['kpi_id', 'kpi_percent_target', 'kpi_group'], 'integer'],
            [['kpi_name', 'kpi_function', 'kpi_desc'], 'string', 'max' => 255],
            [['kpi_b_year'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kpi_id' => 'ID',
            'kpi_name' => 'รายงานตัวชี้วัด',
            'kpi_b_year' => 'ปีงบประมาณ',
            'kpi_function' => 'Kpi Function',
            'kpi_percent_target' => 'เป้าหมาย',
            'kpi_desc' => 'รายละเอียดตัวชี้วัด',
            'kpi_group' => 'กลุ่มตัวชี้วัด',
        ];
    }
}
