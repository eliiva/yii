<?php
	use yii\widgets\ListView;
?>

<h1>Актуальные новости</h1>

<?php
	echo ListView::widget([
		'dataProvider' => $data,
		'itemView' => '_news',
	]);
?>