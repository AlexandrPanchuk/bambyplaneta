<?php

use app\components\helper\TranslateHelper;
use yii\db\Migration;

class m171004_123137_add_alias_product_item extends Migration
{
    public function up()
    {
        $this->createIndex('alias_idx', 'product', 'alias');
        $this->createAlias();
    }

    public function createAlias()
    {
        $query = (new \yii\db\Query())
            ->select('*')
            ->from('product')
            ->createCommand();

        foreach ($query->queryAll() as $category) {
            $this->update('product', ['alias' => TranslateHelper::translit($category['name'])], ['id' => $category['id']]);
        }
    }


    public function down()
    {
        $this->dropIndex('alias_idx', 'product');
    }
}
