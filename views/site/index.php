<?php

/* @var $this yii\web\View */
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserOrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<script src="web/js/ie-emulation-modes-warning.js"></script>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide slide" src="pics/banner1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="index?r=site/create" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide slide" src="pics/banner2.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="index?r=site/create" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide slide" src="pics/banner3.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="index?r=site/create" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

<div class="container">
<div class="row">

    <div class="col-sm-8">

        <?php foreach($places as $place)
            echo '<div class="col-lg-5 card-place">
            <img class="card-place__img" src="pics/default.jpg" alt="">
            <h4 class="card-place__category"> <b>Категория: </b> '.$place->place_category.' </h4>
            <h4 class="card-place__place"> '.$place->place_name.' </h4>
            '. Html::a('Забронировать', ['create'], ['class' => 'btn btn-success']) .'
        </div>';
            ?>





    </div><!-- /.main -->

    <div class="col-sm-3 col-sm-offset-1">
        <div class="sidebar-module">
            <h4>Категории</h4>
            <ol class="list-unstyled">
                <li><a href="#">Одноместный (<?= $counter[0] ?>)</a></li>
                <li><a href="#">Двуместный (<?= $counter[1] ?>)</a></li>
                <li><a href="#">Люкс (<?= $counter[2] ?>)</a></li>
                <li><a href="#">Де-Люкc (<?= $counter[3] ?>)</a></li>
            </ol>
        </div>
    </div><!-- /.sidebar -->

</div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="web/js/jquery.min.js"><\/script>')</script>
<script src="web/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="web/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="web/js/ie10-viewport-bug-workaround.js"></script>
