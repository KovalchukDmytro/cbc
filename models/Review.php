<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Review extends ActiveRecord
{
	public function getAll()
	{
		return Review::find()->all();
	}
}
