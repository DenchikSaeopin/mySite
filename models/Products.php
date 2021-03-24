<?php

namespace app\models;
use yii\db\ActiveRecord;


class Products extends ActiveRecord
{
  public static function tableName()
  {
    return 'products'; 
  }  

  public function getCategories() {
    return $this->hasOne(Categories::className(), ['id' => 'category']);
  } 
}
