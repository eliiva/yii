<?php 
	use yii\helpers\Html;
	use yii\helpers\HtmlPurifier;
	use yii\helpers\Url;
?>

<div class="post">
	<div class="box">
		<div style="float:left">
			<? 
				if ($model->image):
					echo Yii::$app->formatter->asImage('@web/img/news/'.$model->image);
				else:
					echo Yii::$app->formatter->asImage('@web/img/news/n0.jpg');
				endif
			?>
		</div>
		<div>
			<p class="date">
				<?=Yii::$app->formatter->asDate($model->date, 'long')?>
			</p>
			<p class="title">
				<?= Html::a($model->title, Url::to('news/' . $model->id))?>
			</p>
		</div>
		<div style="clear:both">
		</div>
	</div>
</div>