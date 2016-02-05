<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmbis_pop_groups".
 *
 * @property integer $pop_group_id
 * @property string $pop_grouup_name
 * @property string $pop_person
 */
class CmbisPopGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmbis_pop_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pop_group_id'], 'required'],
            [['pop_group_id'], 'integer'],
            [['pop_grouup_name'], 'string', 'max' => 50],
            [['pop_person'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pop_group_id' => 'Pop Group ID',
            'pop_grouup_name' => 'Pop Grouup Name',
            'pop_person' => 'Pop Person',
        ];
    }
}
