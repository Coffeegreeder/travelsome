<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Регистрация | TravelSome';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact container">
  <h1><?= Html::encode($this->title) ?></h1>
  <div class="row">
    <div class="col-lg-5">
      <p><a href="index?r=site/login">Уже есть аккаунт?</a></p>

      <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

      <?= $form->field($model, 'email') ?>

      <?= $form->field($model, 'password')->passwordInput() ?>

      <?= $form->field($model, 'confirmPassword')->passwordInput()?>

      <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>
