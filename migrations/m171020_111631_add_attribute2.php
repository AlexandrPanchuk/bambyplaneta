<?php

use yii\db\Migration;

class m171020_111631_add_attribute2 extends Migration
{
    public function up()
    {
        $this->createTable('{{%attribute}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        // $this->createIndex('idx-value-product_id', '{{%value}}', 'product_id');
        // $this->createIndex('idx-value-attribute_id', '{{%value}}', 'attribute_id');

    }

    public function down()
    {
        $this->dropTable('{{%value}}');
        $this->dropTable('{{%attribute}}');
    }
}
