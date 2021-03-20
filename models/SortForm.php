<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SortForm extends Model
{
    public $str; // сортировка по правилу
    public $number; // по склько товаров выводить на страничке

    public function rules()
    {
        return [
            [['str', 'number'], 'trim'],
        ];
    }
}
