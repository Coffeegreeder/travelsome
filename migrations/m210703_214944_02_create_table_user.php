<?php

use yii\db\Migration;

class m210703_214944_02_create_table_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user}}',
            [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull(),
                'email' => $this->string()->notNull(),
                'password' => $this->string()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('username', '{{%user}}', ['username']);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
