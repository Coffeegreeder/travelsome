<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserOrders */

$this->title = 'бронирование ' . $model->place_name. ' | ' .$model->place_category .' | TravelSome';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->place_id, 'url' => ['view', 'id' => $model->place_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="booking-update container">

  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
