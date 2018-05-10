<?php

namespace app\models;

/**
 * This is the model class for table "inmuebles".
 *
 * @property int $id
 * @property int $propietario_id
 * @property string $propietario_dni
 * @property string $precio
 * @property int $numero_habitaciones
 * @property int $numero_banos
 * @property string $caracteristicas
 * @property bool $lavavajillas
 * @property bool $garaje
 * @property bool $trastero
 *
 * @property Propietarios $propietario
 * @property Propietarios $propietarioDni
 */
class Inmuebles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inmuebles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['propietario_id', 'numero_habitaciones', 'numero_banos'], 'default', 'value' => null],
            [['propietario_id', 'numero_habitaciones', 'numero_banos'], 'integer'],
            [['precio'], 'number'],
            [['caracteristicas'], 'string'],
            [['lavavajillas', 'garaje', 'trastero'], 'boolean'],
            [['propietario_dni'], 'string', 'max' => 9],
            [['propietario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propietarios::className(), 'targetAttribute' => ['propietario_id' => 'id']],
            [['propietario_dni'], 'exist', 'skipOnError' => true, 'targetClass' => Propietarios::className(), 'targetAttribute' => ['propietario_dni' => 'dni']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propietario_id' => 'Propietario ID',
            'propietario_dni' => 'Propietario Dni',
            'precio' => 'Precio',
            'numero_habitaciones' => 'Numero de habitaciones',
            'numero_banos' => 'Numero de baños',
            'caracteristicas' => 'Caracteristicas',
            'lavavajillas' => 'Lavavajillas',
            'garaje' => 'Garaje',
            'trastero' => 'Trastero',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario()
    {
        return $this->hasOne(Propietarios::className(), ['id' => 'propietario_id'])->inverseOf('inmuebles');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietarioDni()
    {
        return $this->hasOne(Propietarios::className(), ['dni' => 'propietario_dni'])->inverseOf('inmuebles0');
    }
}
