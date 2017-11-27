<?php

use app\components\helper\TranslateHelper;
use yii\db\Migration;

class m171004_123627_temp_migrate extends Migration
{
    public function up()
    {
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


}
