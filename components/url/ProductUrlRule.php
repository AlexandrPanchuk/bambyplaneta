<?php

namespace app\components\url;

use app\models\Category;
use app\models\Product;
use yii\web\UrlRuleInterface;

class ProductUrlRule extends \yii\web\UrlRule implements UrlRuleInterface
{
    public $connectionID = 'db';

    public function init()
    {
        if ($this->name === null) {
            $this->name = __CLASS__;
        }
    }

    public function createUrl($manager, $route, $params)
    {
        if ($route == 'product/view') {

            $path = 'product/';

            $idCategory = $params['id'];

            if ($idCategory) {
                $alias = Product::getDb()->cache(function () use ($idCategory) {
                   return Product::findOne($idCategory)->alias;
                });

                $path .= $alias;
            }

            return $path;
        }
        return false;

    }

    public function parseRequest($manager, $request)
    {

        $pathInfo = $request->getPathInfo();


        $route = $pathInfo;
        $pieces = explode('/', $route);
        $params = [];


        if ($pieces[0] === 'product') {

            $route = 'product/view';

            $pces = $pieces[1];

            $idProduct = Product::getDb()->cache(function () use ($pces) {
               return Product::getIdByAlias($pces);
            });

            $params['id'] = $idProduct;

            return [$route, $params];

        }

        return false;


    }
}

