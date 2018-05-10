<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InmueblesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'propietario_id') ?>

    <?= $form->field($model, 'propietario_dni') ?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'numero_habitaciones') ?>

    <?php // echo $form->field($model, 'numero_banos') ?>

    <?php // echo $form->field($model, 'caracteristicas') ?>

    <?php // echo $form->field($model, 'lavavajillas')->checkbox() ?>

    <?php // echo $form->field($model, 'garaje')->checkbox() ?>

    <?php // echo $form->field($model, 'trastero')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
