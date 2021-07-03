<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserOrders */

$this->title = 'Создание заявки';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
<div class="booking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>