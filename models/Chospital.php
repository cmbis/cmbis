<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chospital".
 *
 * @property string $hoscode
 * @property string $hosname
 * @property string $hostype
 * @property string $address
 * @property string $road
 * @property string $mu
 * @property string $subdistcode
 * @property string $distcode
 * @property string $provcode
 * @property string $postcode
 * @property string $hoscodenew
 * @property string $bed
 * @property string $level_service
 * @property string $bedhos
 * @property integer $hdc_regist
 * @property string $hasdata
 * @property string $hosname2
 */
class Chospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hoscode'], 'required'],
            [['hdc_regist'], 'integer'],
            [['hoscode', 'postcode', 'bed', 'bedhos'], 'string', 'max' => 5],
            [['hosname', 'level_service', 'hosname2'], 'string', 'max' => 255],
            [['hostype', 'mu', 'subdistcode', 'distcode', 'provcode'], 'string', 'max' => 2],
            [['address', 'road'], 'string', 'max' => 50],
            [['hoscodenew'], 'string', 'max' => 9],
            [['hasdata'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hoscode' => 'Hoscode',
            'hosname' => 'Hosname',
            'hostype' => 'Hostype',
            'address' => 'Address',
            'road' => 'Road',
            'mu' => 'Mu',
            'subdistcode' => 'Subdistcode',
            'distcode' => 'Distcode',
            'provcode' => 'Provcode',
            'postcode' => 'Postcode',
            'hoscodenew' => 'Hoscodenew',
            'bed' => 'จำนวนเตียง',
            'level_service' => 'ระดับการบริการ',
            'bedhos' => 'Bedhos',
            'hdc_regist' => 'Hdc Regist',
            'hasdata' => 'Hasdata',
            'hosname2' => 'Hosname2',
        ];
    }

}
