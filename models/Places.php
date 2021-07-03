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
            [['place_name', 'place_category'], 'required'],
            [['place_status', 'place_category'], 'integer'],
            [['place_name'], 'string', 'max' => 255],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrders::className(), 'targetAttribute' => ['place_id' => 'booking']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Place ID',
            'place_name' => 'Place Name',
            'place_status' => 'Place Status',
            'place_category' => 'Place Category',
        ];
    }


    /**
     * Gets query for [[Place]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(UserOrders::className(), ['booking' => 'place_id']);
    }
}
