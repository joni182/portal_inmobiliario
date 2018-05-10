<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inmuebles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'propietario_id')->textInput() ?>

    <?= $form->field($model, 'propietario_dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'numero_habitaciones')->textInput() ?>

    <?= $form->field($model, 'numero_banos')->textInput() ?>

    <?= $form->field($model, 'caracteristicas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lavavajillas')->checkbox() ?>

    <?= $form->field($model, 'garaje')->checkbox() ?>

    <?= $form->field($model, 'trastero')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
