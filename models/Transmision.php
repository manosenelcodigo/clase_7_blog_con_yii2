<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transmision".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $embed
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 * @property string $inicio
 * @property string $fin
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Transmision extends MiActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transmision';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'inicio', 'fin'], 'required'],
            [['descripcion'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'inicio', 'fin'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['embed'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'embed' => 'Embed',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
