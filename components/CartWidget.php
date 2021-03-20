<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;


class CartWidget extends Widget
{
    public $count;
    function __construct() {
        $session = Yii::$app->session; // инициализация сессии
        $session->open(); // открытие сессии

        if($session->has('productsSession')) {
           $productsSession = $session->get('productsSession');
        }

        if(isset($productsSession) && is_array($productsSession) && !empty($productsSession)) {
            $this->count = count($productsSession);
        } else{
            $this->count = 0;
        }
    }


    public function run() {
        echo "<a href='".Url::toRoute('page/cart')."'>
            <i class='fa fa-shopping-cart'></i>
            <span>Корзина</span>
            <div class='qty'>".$this->count."</div>
        </a>";
    }
}