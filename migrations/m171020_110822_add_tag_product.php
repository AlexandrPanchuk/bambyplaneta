<?php

use yii\db\Migration;

class m171020_110822_add_tag_product extends Migration
{
     public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createIndex('idx-tag-name', 'tag', 'name');

        $this->createTable('product_tag', [
            'product_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-product_tag-product-id', 'product_tag', 'product_id');
        $this->createIndex('idx-product_tag-tag-id', 'product_tag', 'tag_id');

    }
}
