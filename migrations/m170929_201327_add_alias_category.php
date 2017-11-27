<?php

use app\components\helper\TranslateHelper;
use yii\db\Migration;

class m170929_201327_add_alias_category extends Migration
{
    public function up()
    {
        $this->addColumn('category', 'alias', $this->string(255));
        $this->createIndex('alias_idx', 'category', 'alias');

        $this->createAlias();
    }

    public function createAlias()
    {
        $query = (new \yii\db\Query())
            ->select('*')
            ->from('category')
            ->createCommand();

        foreach ($query->queryAll() as $category) {
            $this->update('category', ['alias' => TranslateHelper::translit($category['name'])], ['id' => $category['id']]);
        }
    }


    public function down()
    {
        $this->dropColumn('category', 'alias');
        $this->dropIndex('alias_idx', 'category');
    }


}
