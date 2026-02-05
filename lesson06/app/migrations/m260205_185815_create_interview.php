<?php

use yii\db\Migration;

class m260205_185815_create_interview extends Migration
{
    /**
     * {@inheritdoc}
     */
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%interview}}', [
           'id' => $this->primaryKey(),
           'date' => $this->date()->notNull(),
           'firstName' => $this->string()->notNull(),
            'lastName' => $this->string()->notNull(),
            'email' => $this->string(),
            'status' => $this->smallInteger()->notNull(),
            'reject_reason' => $this->string(),
            'employee_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-interview-status', '{{%interview}}', 'status');
        $this->createIndex('idx-interview-employee_id', '{{%interview}}', 'employee_id');

        $this->addForeignKey('fk-interview-employee_id', '{{%interview}}', 'employee_id', '{{%employee}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%interview}}');
    }

}
