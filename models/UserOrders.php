<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_orders".
 *
 * @property int $order_id
 * @property int $booking
 * @property string $customer_name
 * @property string $customer_email
 * @property string $arrival_date
 * @property string $departure_date
 *
 * @property Places $places
 */
class UserOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_name', 'customer_email', 'arrival_date', 'departure_date'], 'required'],
            [['booking'], 'integer'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['customer_name', 'customer_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'номер брони',
            'booking' => 'бронь',
            'customer_name' => 'имя',
            'customer_email' => 'email',
            'arrival_date' => 'дата заезда',
            'departure_date' => 'дата выезда',
        ];
    }

    /**
     * Gets query for [[Places]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
        return $this->hasOne(Places::className(), ['place_id' => 'booking']);
    }
}
