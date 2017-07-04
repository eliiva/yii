<?php
	use yii\widgets\ListView;
	use yii\helpers\Html;
	use yii\helpers\HtmlPurifier;
	use yii\helpers\Url;
?>

<h2>Hовости</h2>
<h3>Добавить новость</h3>
	<p>
        <?= Html::a('Create news', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


<?php
	echo ListView::widget([
		'dataProvider' => $data,
		'itemView' => '_index',
	]);
?>