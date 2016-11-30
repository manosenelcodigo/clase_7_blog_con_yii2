<?php
namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\BlameableBehavior;


class MiActiveRecord extends ActiveRecord{
	
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
		];
	}
	
}