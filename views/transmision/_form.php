<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Transmision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transmision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'embed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inicio')->widget(DateTimePicker::classname(),
    [
        'options' => ['placeholder' => 'Seleccione la fecha ...'],
        'pluginOptions' => [
            'autoclose' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'fin')->widget(DateTimePicker::classname(),
    [
        'options' => ['placeholder' => 'Seleccione la fecha ...'],
        'pluginOptions' => [
            'autoclose' => true,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
