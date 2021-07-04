<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = 'Главная | TravelSome';
?>
<script src="web/js/ie-emulation-modes-warning.js"></script>

<div class="container">
  <div class="row">
    <div class="col-sm-3 col-sm-offset-1">
      <div class="sidebar-module">
        <h4>Категории</h4>
        <ol class="list-unstyled">
          <li class="filter" data-f="all">Все категории</li>
          <li class="filter" data-f="Одноместный">Одноместный (<?= $counter[0] ?>)</li>
          <li class="filter" data-f="Двуместный">Двуместный (<?= $counter[1] ?>)</li>
          <li class="filter" data-f="Люкс">Люкс (<?= $counter[2] ?>)</li>
          <li class="filter" data-f="Де-Люкс">Де-Люкc (<?= $counter[3] ?>)</li>
        </ol>
      </div>
    </div><!-- /.sidebar -->

    <div class="col-sm-8">
      <?php foreach($places as $place)
            echo '<div class="col-lg-5 card-place '.$place->place_category.'">
            <img class="card-place__img" src="pics/default.jpg" alt="">
            <h4 class="card-place__category"> <b>Категория: </b> '.$place->place_category.' </h4>
            <h4 class="card-place__place"> '.$place->place_name.' </h4>
            '.  Html::a('Забронировать', ['update', 'id' => $place->place_id], ['class' => 'btn btn-success']). '
        </div>';
            ?>
    </div><!-- /.main -->
  </div>
</div><!-- /.container -->

<!-- scripts -->
<script src="/web/js/filter.js"></script>
