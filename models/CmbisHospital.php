<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_hospital".
 *
 * @property string $hcode
 * @property string $hname
 * @property string $Amp
 * @property integer $pop
 * @property integer $pop_group
 * @property string $is_benchmark
 */
class CmbisHospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hcode'], 'required'],
            [['pop', 'pop_group'], 'integer'],
            [['hcode'], 'string', 'max' => 5],
            [['hname', 'Amp'], 'string', 'max' => 100],
            [['is_benchmark'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hcode' => 'Hcode',
            'hname' => 'Hname',
            'Amp' => 'Amp',
            'pop' => 'Pop',
            'pop_group' => 'Pop Group',
            'is_benchmark' => 'Is Benchmark',
        ];
    }
}
