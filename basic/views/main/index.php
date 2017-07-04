<?php
/* @var $this yii\web\View */
use yii\bootstrap\Carousel;
?>

<h2>ЖК "Васильевский Квартал"</h2>

<?php
echo Carousel::widget([
    'items' => [
        // the item contains only the image
        '<img src="http://localhost:80/yiiproject/basic/web/img/1.jpg"/>',
		'<img src="http://localhost:80/yiiproject/basic/web/img/2.jpg"/>',
		'<img src="http://localhost:80/yiiproject/basic/web/img/3.jpg"/>',
		'<img src="http://localhost:80/yiiproject/basic/web/img/4.jpg"/>',
		],
        // the item contains both the image and the caption
	'options' => ['class' => 'carousel slide', 'data-interval' => 10000],
	'controls' => [
		'<span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span>',
		'<span class="glyphicon glyphicon-chevron-right" arial-hidden="true"></span>',
	]
]);
?>