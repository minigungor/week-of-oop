<?php

use yii\db\Migration;

class m260205_192514_create_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }

}
