<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InmueblesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$urlTelefono = Url::to(['propietarios/telefono-ajax']);
$js = <<<JS
        $('button[name=boton-telefono]').on('click',function(){
            let boton = $(this);
            $.get("$urlTelefono",{idPropietario: $(this).data('id')} ,function(data){
                $('button').parent().find('p').empty()
                boton.parent().append('<p>'+data+'</p>');
            })

        })

        $('#desplegar').on('click', function(){
            $('#busqueda-form').slideToggle();
        });
JS;
$this->registerJs($js);

$this->title = 'Inmuebles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inmuebles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::button('Desplegar busqueda', ['class' => 'btn btn-primary', 'id' => 'desplegar']) ?>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
        GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'precio:currency',
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
                    return Html::button('Estoy interesado',[
                        'name' => 'boton-telefono',
                        'class' => 'btn btn-xs btn-success',
                         'data' => [
                             'id' => $model->propietario->id
                             ]
                        ])
                        ;
                },
            ],
        ],
    ]); ?>
</div>
