<?php

use yii\db\Migration;

class m260205_192730_create_recruit extends Migration
{
    /**
     * {@inheritdoc}
     */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%recruit}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
        ]);

        $this->createIndex('idx-recruit-order_id', '{{%recruit}}', 'order_id');
        $this->createIndex('idx-recruit-employee_id', '{{%recruit}}', 'employee_id');

        $this->addForeignKey('fk-recruit-order_id', '{{%recruit}}', 'order_id', '{{%order}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-recruit-employee_id', '{{%recruit}}', 'employee_id', '{{%employee}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%recruit}}');
    }

}
