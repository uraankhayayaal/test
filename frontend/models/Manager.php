<?php

namespace frontend\models;

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
class Manager extends \common\models\Manager
{
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
        return $this->hasMany(Journal::className(), ['manager_id' => 'id'])->orderBy(['created_at' => SORT_DESC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManagerBonuses()
    {
        return $this->hasMany(ManagerBonus::className(), ['manager_id' => 'id'])->orderBy(['created_at' => SORT_DESC]);
    }

    public function callsCount($month)
    {
        $newdate = strtotime ( '-1 month' , $month ) ;
        $sum = Journal::find()
            ->select('sum(size) as size')
            ->where(['manager_id' => $this->id])
            ->andWhere(['between','created_at', $newdate, $month-1])
            ->one();
        return $sum == null ? 0 : $sum->size;
    }

    public function bonus($size)
    {
        $model = \frontend\models\Bonus::find()->where(['>=', 'count', $size])->orderBy(['count' => SORT_ASC])->One();
        if($model === null) return false;
        return $model;
    }

    public function getFirstDayOfLastMonth()
    {
        $datestring = date('Y-m-d') . ' first day of last month';
        return strtotime(date_create($datestring)->format('Y-m-d'));
    }
}
