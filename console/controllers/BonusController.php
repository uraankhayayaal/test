<?php

namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;

class BonusController extends Controller
{
    protected $max_last_period = 60*60*24*7*52.1429*5;

    public function actionIndex()
    {
        $model = \frontend\models\Manager::find()->all();
        
        if ($model === null) {
            echo "No mangers for solve salary!\n";
            return ExitCode::UNSPECIFIED_ERROR;
        }

        foreach ($model as $key => $manager) {
            if (empty($manager->managerBonuses))
            {
                $this->solve($manager, 60);
                /*//$calls = $manager->journals;
                $query = \frontend\models\Journal::find()
                    ->select( 'MONTH(created_at) as mon, YEAR(created_at) as year, sum(size) as size, created_at')
                    ->where(['manager_id' => $manager->id])
                    ->groupBy ('mon, year');
                //var_dump($query->all());
                if($query !== null){
                    foreach ($query->all() as $key => $month) {
                        $managerBonus = new \frontend\models\ManagerBonus();
                        $managerBonus->manager_id = $manager->id;
                        $this->bonusSize($month->size) ? $managerBonus->bonus_id = $this->bonusSize($month->size) : null;
                        $managerBonus->created_at = \Yii::$app->formatter->asTimestamp($month->created_at);// Возможно есть ошибка если менеджер начинает свою работу 3-го числа месяца, то при дальнейших сравения даты может выдать неправильный ответ
                        $managerBonus->save();
                        //var_dump($this->bonusSize($month->size));
                    }
                }*/
            }else{
                $this->solve($manager, 1);
                /*$time = $manager->firstDayOfLastMonth;
                $last_moth = \frontend\models\Journal::find()
                    ->select( 'sum(size) as size, created_at')
                    ->where(['manager_id' => $manager->id])
                    ->andWhere([">=", 'created_at', $time])
                    ->one();
                //var_dump($last_moth);
                if($last_moth !== null){
                    $managerBonus = new \frontend\models\ManagerBonus();
                    $managerBonus->manager_id = $manager->id;
                    $this->bonusSize($last_moth->size) ? $managerBonus->bonus_id = $this->bonusSize($last_moth->size) : null;
                    $managerBonus->created_at = \Yii::$app->formatter->asTimestamp($last_moth->created_at);
                    if(\frontend\models\ManagerBonus::find()->where(['manager_id' => $manager->id, 'created_at' => $last_moth->created_at])->one() === null) $managerBonus->save();
                }*/
            }
        }

        // do something
        return ExitCode::OK;
    }

    public function solve($manager, $period)
    {
        $time = $manager->firstDayOfLastMonth;
        for ($i=$period; $i > 0; $i--) { 
            $newdate = strtotime ( '-'.$i.' month' , strtotime ( date("Y-m") ) ) ;
            $newdate = date ( 'Y-m' , $newdate );
            $this->monthSalary($manager, strtotime($newdate));
        }
    }
    public function monthSalary($manager, $month){
        $managerBonus = new \frontend\models\ManagerBonus();
        $managerBonus->salary = $manager->oklad + ($manager->bonus($manager->callsCount($month)) ? $manager->bonus($manager->callsCount($month))->size : 0);
        $managerBonus->manager_id = $manager->id;
        $managerBonus->bonus_id = $manager->bonus($manager->callsCount($month)) ? $manager->bonus($manager->callsCount($month))->id : null;
        $newdate = strtotime ( '-1 month' , $month ) ;
        $managerBonus->created_at = $newdate;
        var_dump($month);
        if(\frontend\models\ManagerBonus::find()->where(['manager_id' => $manager->id, 'created_at' => $month])->one() === null) $managerBonus->save();
    }


}