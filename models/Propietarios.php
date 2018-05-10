<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $dni
 * @property string $telefono
 *
 * @property Inmuebles[] $inmuebles
 * @property Inmuebles[] $inmuebles0
 */
class Propietarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propietarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'telefono'], 'required'],
            [['telefono'], 'number'],
            [['nombre', 'apellido'], 'string', 'max' => 255],
            [['dni'], 'string', 'max' => 9],
            [['dni'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'dni' => 'Dni',
            'telefono' => 'Telefono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmuebles::className(), ['propietario_id' => 'id'])->inverseOf('propietario');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles0()
    {
        return $this->hasMany(Inmuebles::className(), ['propietario_dni' => 'dni'])->inverseOf('propietarioDni');
    }
}
