<?php

use yii\db\Migration;

class m171002_133017_add_size_product extends Migration
{
    public function up()
    {
        $this->addColumn('product', 'size', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('product', 'size');
    }
}
