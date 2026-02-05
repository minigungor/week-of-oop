<?php

use yii\db\Migration;

class m260205_193313_create_assignment extends Migration
{
    /**
     * {@inheritdoc}
     */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%assignment}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'position_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'rate' => $this->decimal(4, 2)->notNull(),
            'salary' => $this->integer()->notNull(),
            'active' => $this->boolean()->notNull(),
        ]);

        $this->createIndex('idx-assignment-order_id', '{{%assignment}}', 'order_id');
        $this->createIndex('idx-assignment-employee_id', '{{%assignment}}', 'employee_id');
        $this->createIndex('idx-assignment-position_id', '{{%assignment}}', 'position_id');
        $this->createIndex('idx-assignment-active', '{{%assignment}}', 'active');

        $this->addForeignKey('fk-assignment-order_id', '{{%assignment}}', 'order_id', '{{%order}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-assignment-employee_id', '{{%assignment}}', 'employee_id', '{{%employee}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-assignment-position_id', '{{%assignment}}', 'employee_id', '{{%employee}}', 'id', 'CASCADE', 'RESTRICT');

    }

    public function down()
    {
        $this->dropTable('{{%assignment}}');
    }

}
