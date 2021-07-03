<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<base href="/web/">
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'TravelSome',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (
                    '<li>
                        <a href="index?r=site/login">Вход</a>
                     </li>
                     <li>
                        <a href="index?r=site/register">Регистрация</a>
                     </li>'
            ) : (
                '<li>
                <a href="index?r=site/orders">Ваши заказы ('. Yii::$app->user->identity->username .')</a>
                </li><li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход ',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

        <?= $content ?>
</div>

<!-- FOOTER -->
<hr class="featurette-divider">

<footer class="container">
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; 2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
