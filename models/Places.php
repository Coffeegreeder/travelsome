<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property int $place_id
 * @property string $place_name
 * @property int|null $place_status
 * @property int $place_category
 *
 * @property UserOrders $place
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place_category'], 'required'],
            [['place_status', 'place_category', 'place_id'], 'integer'],
            [['arrival_date', 'departure_date', 'place_id'], 'safe'],
            [['place_name', 'customer_name', 'customer_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Номер брони',
            'place_name' => 'Имя',
            'place_email' => 'Email',
            'place_status' => 'Статус',
            'place_category' => 'Категория',
            'arrival_date' => 'Время прибытия',
            'departure_date' => 'Время отъезда',
        ];
    }
}
