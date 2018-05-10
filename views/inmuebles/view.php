<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inmuebles */

$this->title = $model->precio . ' - ' . $model->propietario->nombre . ' ' . $model->propietario->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Inmuebles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'propietario.nombre:text',
            'propietario.apellido:text',
            'precio',
            'numero_habitaciones',
            'numero_banos',
            'caracteristicas:ntext',
            'lavavajillas:boolean',
            'garaje:boolean',
            'trastero:boolean',
        ],
    ]) ?>

</div>
