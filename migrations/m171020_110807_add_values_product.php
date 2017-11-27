<?php

use yii\db\Migration;

class m171020_110807_add_values_product extends Migration
{
    public function up()
    {
        $this->createTable('{{%value}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'attribute_id' => $this->integer()->notNull(),
            'value' => $this->string()->notNull()
        ]);

        $this->createIndex('idx-value-product_id', '{{%value}}', 'product_id');
        $this->createIndex('idx-value-attribute_id', '{{%value}}', 'attribute_id');

    }
}
