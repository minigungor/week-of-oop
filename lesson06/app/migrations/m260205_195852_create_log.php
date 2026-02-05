<?php

use yii\db\Migration;

class m260205_195852_create_log extends Migration
{
    /**
     * {@inheritdoc}
     */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%log}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
            'message' => $this->text(),
        ]);

        $this->createIndex('idx-log-user_id', '{{%log}}', 'user_id');
    }

    public function down()
    {
        $this->dropTable('{{%log}}');
    }
}
