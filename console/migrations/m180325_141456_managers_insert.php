<?php

use yii\db\Migration;

/**
 * Class m180325_141456_managers_insert
 */
class m180325_141456_managers_insert extends Migration
{
    public function safeUp()
    {
        $this->insert('{{%manager}}', [
            'name' => 'Хельга Браун',
            'oklad' => 20000,
        ]);
        $this->insert('{{%manager}}', [
            'name' => 'Барак Обама',
            'oklad' => 30000,
        ]);
        $this->insert('{{%manager}}', [
            'name' => 'Денис Козлов',
            'oklad' => 40000,
        ]);


        $this->insert('{{%bonus}}', [
            'count' => 100,
            'name' => 'Начальная',
            'size' => 100,
        ]);
        $this->insert('{{%bonus}}', [
            'count' => 200,
            'name' => 'Средняя',
            'size' => 200,
        ]);
        $this->insert('{{%bonus}}', [
            'count' => 300,
            'name' => 'Высшая',
            'size' => 300,
        ]);


        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('1.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 40,
            'created_at' => Yii::$app->formatter->asTimestamp('2.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 40,
            'created_at' => Yii::$app->formatter->asTimestamp('3.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 30,
            'created_at' => Yii::$app->formatter->asTimestamp('4.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('5.01.2015'),
        ]); $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('6.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('7.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('8.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 20,
            'created_at' => Yii::$app->formatter->asTimestamp('9.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 30,
            'created_at' => Yii::$app->formatter->asTimestamp('10.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('11.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'size' => 20,
            'created_at' => Yii::$app->formatter->asTimestamp('12.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('13.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 1,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('14.01.2015'),
        ]);


        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('1.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'size' => 20,
            'created_at' => Yii::$app->formatter->asTimestamp('2.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('3.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'size' => 30,
            'created_at' => Yii::$app->formatter->asTimestamp('4.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('5.01.2015'),
        ]); $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('6.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('7.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('8.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 1,
            'created_at' => Yii::$app->formatter->asTimestamp('9.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 1,
            'created_at' => Yii::$app->formatter->asTimestamp('10.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 1,
            'created_at' => Yii::$app->formatter->asTimestamp('11.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 1,
            'created_at' => Yii::$app->formatter->asTimestamp('12.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('13.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 2,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('14.01.2015'),
        ]);
        

        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('1.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('2.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('3.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 30,
            'created_at' => Yii::$app->formatter->asTimestamp('4.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('5.01.2015'),
        ]); $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('6.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('7.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('8.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('9.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 30,
            'created_at' => Yii::$app->formatter->asTimestamp('10.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 10,
            'created_at' => Yii::$app->formatter->asTimestamp('11.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'size' => 20,
            'created_at' => Yii::$app->formatter->asTimestamp('12.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('13.01.2015'),
        ]);
        $this->insert('{{%journal}}', [
            'manager_id' => 3,
            'status' => 5,
            'created_at' => Yii::$app->formatter->asTimestamp('14.01.2015'),
        ]);
    }

    public function safeDown()
    {

    }
}
