<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_area_hosp".
 *
 * @property string $VID
 * @property string $AREA_NAME
 * @property string $Hosp
 * @property string $Hosp_des
 * @property string $AMP
 * @property string $Amp_Des
 * @property string $TUM
 * @property string $Tum_des
 * @property string $CHK
 * @property string $No_Count
 * @property string $Remark
 * @property string $CUP
 * @property string $Benchmark
 */
class CmbisAreaHosp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_area_hosp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VID'], 'required'],
            [['VID', 'AREA_NAME', 'Hosp', 'Hosp_des', 'AMP', 'Amp_Des', 'TUM', 'Tum_des', 'CHK', 'No_Count', 'Remark', 'CUP', 'Benchmark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VID' => 'Vid',
            'AREA_NAME' => 'Area  Name',
            'Hosp' => 'Hosp',
            'Hosp_des' => 'Hosp Des',
            'AMP' => 'Amp',
            'Amp_Des' => 'Amp  Des',
            'TUM' => 'Tum',
            'Tum_des' => 'Tum Des',
            'CHK' => 'Chk',
            'No_Count' => 'No  Count',
            'Remark' => 'Remark',
            'CUP' => 'Cup',
            'Benchmark' => 'Benchmark',
        ];
    }
}
