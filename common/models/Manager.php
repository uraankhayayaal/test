<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manager".
 *
 * @property int $id
 * @property string $name
 * @property int $oklad
 *
 * @property Journal[] $journals
 * @property ManagerBonus[] $managerBonuses
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'oklad'], 'required'],
            [['oklad'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'oklad' => 'Oklad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournals()
    {
        return $this->hasMany(Journal::className(), ['manager_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagerBonuses()
    {
        return $this->hasMany(ManagerBonus::className(), ['manager_id' => 'id']);
    }
}
