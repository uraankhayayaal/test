<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "journal".
 *
 * @property int $id
 * @property int $manager_id
 * @property int $size
 * @property int $status
 * @property int $created_at
 *
 * @property Manager $manager
 */
class Journal extends \common\models\Journal
{
    const WEEK_END = 5;
    const ABSENT = 1;

    const STATUSES = [
        self::WEEK_END => 'Выходной',
        self::ABSENT => 'Не работал',
    ];

    public function rules()
    {
        return [
            [['manager_id', 'created_at'], 'required'],
            [['manager_id', 'size', 'status', 'created_at'], 'integer'],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => \commonn\models\Manager::className(), 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manager_id' => 'Manager ID',
            'size' => 'Size',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
