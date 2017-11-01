<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'book_type')->widget(Select2::classname(),[
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Type::find()->all(),'id','name'),
        'options' => [
            'multiple' => true,
            'placeholder' => 'Click this field to select'
        ]
    ])->label('Book Type') ?>

    <?= $form->field($model, 'date_published')->widget(DatePicker::classname(),[
        'pluginOptions'=>[
            'format' => 'yyyy-mm-dd'
        ],
    ]) ?>

    <?= $form->field($model, 'number_of_pages')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
