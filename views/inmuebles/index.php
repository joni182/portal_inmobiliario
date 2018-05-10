<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InmueblesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$js = <<<JS
        $('button').on('click', function(){
            $(this).parent().find('p').css({'display':'inline'})
        })
JS;
$this->registerJs($js);

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>



    <?=
        GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'precio:currency:Precio mínimo',
            'numero_habitaciones',
            'numero_banos',
            'caracteristicas:ntext',
            'lavavajillas:boolean',
            'garaje:boolean',
            'trastero:boolean',
            [
                'label' => 'Contacta',
                'content' => function ($model, $key, $index, $column) {
                    $telefono = $model->propietario->telefono;
                    return Html::button('Estoy interesado',['class' => 'btn btn-xs btn-success']). "<br><br><p style='display:none;'>Tel: $telefono <p>";
                },
            ],
        ],
    ]); ?>
</div>
