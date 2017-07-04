<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
//use yii\bootstrap\DatePicker;

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>



<?= $form->field($model, 'date')->widget(DatePicker::className(), [
        'clientOptions' => [
            'minDate'=>'+0',
            'maxDate'=>'+2M',
            'format' => 'yyyy-mm-dd',
            'language' => 'ru',
            'defaultDate' =>Yii::$app->formatter->asDate('now', 'yyyy-mm-dd'),
        ],
    ]);?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактирвоать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

    <?php ActiveForm::end(); ?>

</div>

