<?php 
	use yii\helpers\Html;
	use yii\helpers\HtmlPurifier;
	use yii\helpers\Url;
	use yii\bootstrap\Modal;
	use yii\widgets\ActiveForm;
?>



<div class="post">
	<table>
		<tr>
			<th>ID</th>
			<th>Дата</th>
			<th>Название</th>
			<th>Текст</th>
		</tr>
		<tr>
			<td>
				<?=Yii::$app->formatter->asText($model->id)?>
			</td>
			<td>
				<?=Yii::$app->formatter->asDate($model->date, 'long')?>
			</td>
			<td>
				<?=Yii::$app->formatter->asText($model->title)?>
			</td>
			<td>
				<?=Yii::$app->formatter->asText($model->text)?>
			</td>
			
		</tr>
	</table>
	<div class="container">
	<?php
	Modal::begin([
		'header' => '<h3>Edit news</h3>',
		'toggleButton' => ['label' => 'edit'],
		'id' => 'editnews',
	]); ?>
	
	<?php $form = ActiveForm::begin([
		'action' => ['update'],
		//'attributes' => $attributes,
		'method' => 'get',
	]); ?>

        <?= $form->field($model, 'id') ?>
        <?= $form->field($model, 'date') ?>
		<?= $form->field($model, 'title') ?>
		<?= $form->field($model, 'text') ?>
    
        <div class="form-group">
            <?= Html::submitButton('edit', ['update', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        </div>
    <?php ActiveForm::end(); ?>
	
	<?php 
	Modal::end();
	?>
	<?= Html::a('delete', ['delete', 'id' => $model->id], [
				'class' => 'btn btn-default',
				'data' => [
                'confirm' => 'Do you really want to delete it?',
                'method' => 'post',
            ],
        ]) ?>
</div>
</div>


