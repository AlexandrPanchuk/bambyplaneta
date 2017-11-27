<?php

use yii\db\Migration;

class m171004_123026_add_alias_product extends Migration
{
    public function up()
    {
        $this->addColumn('product', 'alias', $this->string(255));
    }
}
