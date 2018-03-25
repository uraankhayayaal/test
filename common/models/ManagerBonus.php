<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manager_bonus".
 *
 * @property int $id
 * @property int $salary
 * @property int $manager_id
 * @property int $bonus_id
 * @property int $created_at
 *
 * @property Bonus $bonus
 * @property Manager $manager
 */
class ManagerBonus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manager_bonus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salary', 'manager_id', 'created_at'], 'required'],
            [['salary', 'manager_id', 'bonus_id', 'created_at'], 'integer'],
            [['bonus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bonus::className(), 'targetAttribute' => ['bonus_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manager::className(), 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'salary' => 'Salary',
            'manager_id' => 'Manager ID',
            'bonus_id' => 'Bonus ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonus()
    {
        return $this->hasOne(Bonus::className(), ['id' => 'bonus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(Manager::className(), ['id' => 'manager_id']);
    }
}
