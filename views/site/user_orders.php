<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Забронировать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr>
    <h3>Ваши заказы:</h3>
    <table class="books"  border="1">
        <tr>
            <th>имя</th>
            <th>email</th>
            <th>номер брони</th>
            <th>дата заезда</th>
            <th>дата выезда</th>
        </tr>
    <?php foreach ($orders as $order)
        echo '<tr>
                <td>'. $order->customer_name .'</td>
                <td>'. $order->customer_email .'</td>
                <td>'. $order->order_id .'</td>
                <td>'. $order->arrival_date .'</td>
                <td>'. $order->departure_date .'</td>
                </tr>'
        ?>
    </table>
    <br>
    <hr>
</div>
</div>