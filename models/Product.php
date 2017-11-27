<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return "product";
    }

    public static function getIdByAlias($alias)
    {
        $aliasItem = Product::getDb()->cache(function () use ($alias) {
           return  Product::find()->where(['alias' => $alias]);
        });


        if ($aliasItem->one())
        {
            return $aliasItem->one()->id;
        }
    }

    public function getCategory()
	{
		return $this->hasOne(Category::className(), ['id' => 'category_id']);
	}




}

