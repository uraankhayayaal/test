<?php

namespace frontend\models;

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
class ManagerBonus extends \common\models\ManagerBonus
{
    public function rules()
    {
        return [
            [['salary', 'manager_id', 'created_at'], 'required'],
            [['salary', 'manager_id', 'bonus_id', 'created_at'], 'integer'],
            [['bonus_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Bonus::className(), 'targetAttribute' => ['bonus_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Manager::className(), 'targetAttribute' => ['manager_id' => 'id']],
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
}
