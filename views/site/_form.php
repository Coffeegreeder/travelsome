<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;

/* @var $this yii\web\View */
/* @var $model app\models\UserOrders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="booking-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <!-- формы для даты -->
    <?php
    if($model->arrival_date) {
        $model->arrival_date = date("Y-m-d H:i", (integer) $model->arrival_date);
    }
    echo $form->field($model, 'arrival_date')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...'],
        'convertFormat' => true,
        'value'=> date("Y-m-d h:i",(integer) $model->arrival_date),
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd hh:i', // формат времени
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '2015.01.05 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]); ?>

    <?php
    if($model->departure_date) {
        $model->departure_date = date("Y-m-d H:i", (integer) $model->departure_date);
    }
    echo $form->field($model, 'departure_date')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...'],
        'convertFormat' => true,
        'value'=> date("Y-m-d h:i",(integer) $model->departure_date),
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd hh:i', // формат времени
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '2015.01.05 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
