<?php

use yii\db\Migration;

/**
 * Class m180325_135127_managers_salary
 */
class m180325_135127_managers_salary extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%manager}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string()->notNull()->unique(),
            'oklad' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%bonus}}', [
            'id' => $this->primaryKey(),

            'count' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()->unique(),
            'size' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%journal}}', [
            'id' => $this->primaryKey(),

            'manager_id' => $this->integer()->notNull(),
            'size' => $this->integer(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->addForeignKey('journal-manager-fkey','journal','manager_id','manager','id','CASCADE','CASCADE');
        $this->createIndex('journal-manager-idx','journal','manager_id');

        $this->createTable('{{%manager_bonus}}', [
            'id' => $this->primaryKey(),

            'salary' => $this->integer()->notNull(),
            'manager_id' => $this->integer()->notNull(),
            'bonus_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('manager_bonus-manager-fkey','manager_bonus','manager_id','manager','id','CASCADE','CASCADE');
        $this->createIndex('manager_bonus-manager-idx','manager_bonus','manager_id');

        $this->addForeignKey('manager_bonus-bonus-fkey','manager_bonus','bonus_id','bonus','id','CASCADE','CASCADE');
        $this->createIndex('manager_bonus-bonus-idx','manager_bonus','bonus_id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('manager_bonus-manager-fkey','manager_bonus');
        $this->dropIndex('manager_bonus-manager-idx','manager_bonus');

        $this->dropForeignKey('manager_bonus-bonus-fkey','manager_bonus');
        $this->dropIndex('manager_bonus-bonus-idx','manager_bonus');
        
        $this->dropTable('{{%manager_bonus}}');
        
        $this->dropForeignKey('journal-manager-fkey','journal');
        $this->dropIndex('journal-manager-idx','journal');

        $this->dropTable('{{%journal}}');

        $this->dropTable('{{%bonus}}');

        $this->dropTable('{{%manager}}');
    }
}
