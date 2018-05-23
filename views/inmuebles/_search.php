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
        'options' => [
            'style' => 'display:none',
            'id' => 'busqueda-form',
        ]
    ]);

    $desplegable = [
            '' => '--Indiferente--',
            false => 'No',
            true => 'Sí',
        ];

    ?>

    <?= $form->field($model, 'desde')->label('Precio desde') ?>

    <?= $form->field($model, 'hasta')->label('Precio hasta') ?>

    <?= $form->field($model, 'min_hab')->label('Mínimo habitaciones') ?>

    <?= $form->field($model, 'min_ban')->label('Mínimo baños') ?>

    <?= $form->field($model, 'lavavajillas')->dropDownList($desplegable) ?>

    <?= $form->field($model, 'garaje')->dropDownList($desplegable) ?>

    <?= $form->field($model, 'trastero')->dropDownList($desplegable) ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
