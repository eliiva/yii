<?php 
	use yii\helpers\Html;
	use yii\helpers\HtmlPurifier;
	use yii\helpers\Url;
	
	$model = News::find()->where(['id' => $id]);
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
				<?=Yii::$app->formatter->asText($model->title)?>
			</p>
			<p class="text">
				<?=Yii::$app->formatter->asText($model->text)?>
			</p>
		</div>
		<div style="clear:both">
		</div>
	</div>
</div>