<?php

namespace app\components\url;

use app\models\Category;
use yii\web\UrlRuleInterface;
use yii\base\Exception;
use yii\web\HttpException;

class CategoryUrlRule extends \yii\web\UrlRule implements UrlRuleInterface
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
        if ($route == 'category/view') {

            $path = 'category/';

            $idCategory = $params['id'];

            if ($idCategory) {
                $alias = Category::getDb()->cache(function () use ($idCategory) {
                    return Category::findOne($idCategory)->alias;
                });
                $path .= $alias;
            }

            if (isset($params['page'])) {
                $path .= '/page-'.$params['page'];
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

        if ($pieces[0] == 'category') {

            $route = 'category/view';

            $piecesNumb = $pieces[1];

            $idCategory = Category::getDb()->cache(function () use ($piecesNumb) {
               return  Category::getIdByAlias($piecesNumb);
            });
            
            if (empty($idCategory)) {
                throw new HttpException(404, "category_id can not be empty");
            }
            

            $params['id'] = $idCategory;

            if (isset($pieces[2])) {
                if (preg_match('/page-([0-9]+)/', $pieces[2], $math)) {
                    $params['page'] = $math[1];
                }

            }
                return [$route, $params];
        }

        return false;
    }
}

