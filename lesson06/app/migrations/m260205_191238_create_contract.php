<?php

use yii\db\Migration;

class m260205_191238_create_contract extends Migration
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

        $this->createTable('{{%contract}}', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'date_open' => $this->date()->notNull(),
            'date_close' => $this->date(),
            'close_reason' => $this->text(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%contract}}');
    }

}
