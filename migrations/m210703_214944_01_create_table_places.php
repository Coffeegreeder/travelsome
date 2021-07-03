<?php

use yii\db\Migration;

class m210703_214944_01_create_table_places extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%places}}',
            [
                'place_id' => $this->primaryKey(),
                'place_name' => $this->string()->notNull(),
                'place_status' => $this->boolean()->notNull()->defaultValue('0'),
                'place_category' => $this->string()->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%places}}');
    }
}
