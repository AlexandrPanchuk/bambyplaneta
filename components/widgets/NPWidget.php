<?php

namespace app\components\widgets;

use app\components\helper\NovaPoshtaApi2;
use yii\debug\models\timeline\DataProvider;
use yii\jui\Widget;

class NPWidget extends Widget
{
    private $key = 'e791e8020e5373457469c0e00e15ae9c';

    public function run()
    {
        $np = new NovaPoshtaApi2($this->key);


        return $this->render('nova-poshta', [
            'cities' => $np->getCities()
        ]);
    }





}