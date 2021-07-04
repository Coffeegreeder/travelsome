<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши заказы | TravelSome';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
  <div class="booking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <h3>Ваши заказы:</h3>
    <table class="books" border="1">
      <tr>
        <th>имя</th>
        <th>email</th>
        <th>номер брони</th>
        <th>категория</th>
        <th>дата заезда</th>
        <th>дата выезда</th>
      </tr>
      <?php foreach ($orders as $order)
        echo '<tr>
                <td>'. $order->customer_name .'</td>
                <td>'. $order->customer_email .'</td>
                <td>'. $order->place_id .'</td>
                <td>'. $order->place_category .'</td>
                <td>'. $order->arrival_date .'</td>
                <td>'. $order->departure_date .'</td>
                <td>'
            .  Html::a('Изменить дату', ['update', 'id' => $order->place_id], ['class' => 'btn btn-primary']). '</td>
                <td>'.Html::a('Отменить бронь', ['delete', 'id' => $order->place_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверены?',
                    'method' => 'post',
                ],
            ]).'</td>
                </tr>';

        ?>
    </table>
    <?php if($orders == null){
    echo '<h3>Нет заказов </h3>';
    }?>
    <br>
    <hr>
  </div>
</div>
