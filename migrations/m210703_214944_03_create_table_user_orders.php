<?php

use yii\db\Migration;

class m210703_214944_03_create_table_user_orders extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_orders}}',
            [
                'order_id' => $this->primaryKey(),
                'booking' => $this->integer()->notNull(),
                'customer_name' => $this->string()->notNull(),
                'customer_email' => $this->string()->notNull(),
                'arrival_date' => $this->dateTime()->notNull(),
                'departure_date' => $this->dateTime()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('booking', '{{%user_orders}}', ['booking']);

        $this->addForeignKey(
            'user_orders_ibfk_1',
            '{{%user_orders}}',
            ['booking'],
            '{{%places}}',
            ['place_id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function down()
    {
        $this->dropTable('{{%user_orders}}');
    }
}
