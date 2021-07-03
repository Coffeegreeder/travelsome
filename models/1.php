<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $booking_id номер брони
 * @property string $booking_name название брони
 * @property string $booking_status статус
 * @property int $customer_name кем забронирован
 * @property int $category категория
 * @property string $arrival_date дата заезда
 * @property string $departure_date дата выезда
 *
 * @property User $bookedBy
 * @property Categories $category0
 */
class UserOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_name', 'booking_status', 'customer_name', 'category', 'arrival_date', 'departure_date'], 'required'],
            [['category'], 'integer'],
            [['arrival_date', 'departure_date'], 'safe'],
            [['booking_name', 'booking_status', 'customer_name', 'customer_email'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'booking_id' => 'номер брони',
            'booking_name' => 'название брони',
            'customer_email' => 'email',
            'booking_status' => 'статус',
            'customer_name' => 'имя заказчика',
            'category' => 'категория',
            'arrival_date' => 'дата заезда',
            'departure_date' => 'дата выезда',
        ];
    }


    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category']);
    }
}
