<?php

use yii\db\Migration;

class m171002_152753_add_additional_info_product extends Migration
{
    public function up()
    {
        $this->addColumn('product', 'material', $this->string(255));
        $this->addColumn('product', 'color', $this->string(255));
        $this->addColumn('product', 'brand', $this->string(255));
        $this->addColumn('product', 'predestination', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('product', 'material');
        $this->dropColumn('product', 'color');
        $this->dropColumn('product', 'brand');
        $this->dropColumn('product', 'predestination');

    }
}
