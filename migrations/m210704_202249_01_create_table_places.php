<?php

use yii\db\Migration;

class m210704_202249_01_create_table_places extends Migration
{
    /**
     * @throws ReflectionException
     * @throws \yii\db\Exception
     */
    /**
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%places}}',
            [
                'place_id' => $this->primaryKey(),
                'place_status' => $this->boolean()->defaultValue('0'),
                'place_name' => $this->string(),
                'place_category' => $this->string(),
                'customer_name' => $this->string(),
                'customer_email' => $this->string(),
                'arrival_date' => $this->dateTime(),
                'departure_date' => $this->dateTime(),
            ],
            $tableOptions
        );

        Yii::$app->db->createCommand()->batchInsert('places', ['place_id', 'place_status', 'place_name', 'place_category', 'customer_name', 'customer_email', 'arrival_date', 'departure_date'], [
            ['1', '0', 'Варадеро', 'Одноместный', NULL, NULL, NULL, NULL],
            ['2', '0', 'Остров Кайо-Коко', 'Двуместный', NULL, NULL, NULL, NULL],
            ['3', '0', 'Остров Кайо-Санта-Мария', 'Люкс', NULL, NULL, NULL, NULL],
            ['4', '0', 'Остров Кайо-Санта-Мария', 'Де-Люкс', NULL, NULL, NULL, NULL],
            ['5', '0', 'Варадеро', 'Люкс', NULL, NULL, NULL, NULL],
            ['6', '0', 'Варадеро', 'Де-Люкс', NULL, NULL, NULL, NULL],
            ['7', '0', 'Остров Кайо-Коко', 'Одноместный', NULL, NULL, NULL, NULL],
            ['8', '0', 'Остров Кайо-Коко', 'Двуместный', NULL, NULL, NULL, NULL],
        ])->execute();
    }

    public function down()
    {
        $this->dropTable('{{%places}}');
    }
}
