<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id
 * @property string $curso
 * @property string $slug
 * @property string $descripcion
 * @property string $imagen
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Curso extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso', 'descripcion', 'imagen'], 'required'],
            [['descripcion'], 'string'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['curso', 'slug'], 'string', 'max' => 100],
            [['imagen'], 'string', 'max' => 50],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
    
    public function behaviors()
	{
		return [
			'timestamps'	=> [
				'class'	=> \yii\behaviors\TimestampBehavior::className(),
				'createdAtAttribute'	=> 'created_at',
				'updatedAtAttribute'	=> 'updated_at',
				'value'				=> new Expression('NOW()'),
			],
			'blameable'	=> [
				'class'	=> BlameableBehavior::className(),
				'createdByAttribute'	=> 'created_by',
				'updatedByAttribute'	=> 'updated_by',
			],
            [
                'class'     => SluggableBehavior::className(),
                'attribute' => 'curso',
                //'slugAttribute' => 'seo_slug',
            ]
		];
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso' => 'Curso',
            'slug' => 'Slug',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
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
