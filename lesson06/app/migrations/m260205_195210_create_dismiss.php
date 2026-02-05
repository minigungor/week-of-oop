<?php

use yii\db\Migration;

class m260205_195210_create_dismiss extends Migration
{
    /**
     * {@inheritdoc}
     */
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%dismiss}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'reason' => $this->text()->notNull(),
        ]);

        $this->createIndex('idx_order_id', '{{%dismiss}}', 'order_id');
        $this->createIndex('idx_employee_id', '{{%dismiss}}', 'employee_id');

        $this->addForeignKey('fk_order_id', '{{%dismiss}}', 'order_id', '{{%order}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-dismiss-employee_id', '{{%dismiss}}', 'employee_id', '{{%employee}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%dismiss}}');
    }

}
