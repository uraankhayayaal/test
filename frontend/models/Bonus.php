<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bonus".
 *
 * @property int $id
 * @property int $count
 * @property string $name
 * @property int $size
 *
 * @property ManagerBonus[] $managerBonuses
 */
class Bonus extends \common\models\Bonus
{
    public function rules()
    {
        return [
            [['count', 'name', 'size'], 'required'],
            [['count', 'size'], 'integer'],
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
            'count' => 'Count',
            'name' => 'Name',
            'size' => 'Size',
        ];
    }
}
