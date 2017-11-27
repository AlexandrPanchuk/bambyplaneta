<?php

namespace app\components\helper;

class PriceHelper
{

    const UAH = 'грн';

    public static function from($price)
    {
        return $price.'.00 '.self::UAH;
    }

}