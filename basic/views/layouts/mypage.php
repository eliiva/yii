<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Modal;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
<?php
    NavBar::begin([
        'brandLabel' => 'Васильевский квартал',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	$menu = [
            ['label' => 'Home', 'url' => ['/main/index']],
            ['label' => 'About', 'url' => ['/main/about']],
            ['label' => 'Contact', 'url' => ['#'], 'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#contact']],
			['label' => 'News', 'url' => ['/main/news']],
    ];
	if (Yii::$app->user->isGuest) {
		$menu[] = ['label' => 'Авторизация', 'url' => ['/main/login']];
	}
	else {
		$menu[] = ['label' => 'Админка', 'url' => ['/admin/index']];
		$menu[] = ['label' => 'Выход', 'url' => ['/main/logout']];
	}
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu,
    ]);
    NavBar::end();
    ?>

<div class="container">
    <?= $content ?>
</div>
</div>
<footer class="footer">
    <div class="container">
        <p class="fdate"><?= date('Y') ?></p>
    </div>
</footer>

<div class="container">
	<?php
	Modal::begin([
		'header' => '<h3>Contacts</h3>',
		'id' => 'contact',
	]);
	
	echo '<p>Телефон: +7 (812) 917-00-60</p>';
	echo '<p>email: support@volvartal.ru</p>';
	echo '<p>fax: </p>';
	echo '<p>Адрес: г. Санкт-Петербург, Васильевский остров, ул. Наличная, д. 26, корпус 1</p>
	<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor:Mf7_9fasDCkhEZdIKF-neJajFHuu7_hN&amp;width=550&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>';
	Modal::end();
	?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
