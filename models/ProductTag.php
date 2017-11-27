<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_tag".
 *
 * @property integer $product_id
 * @property integer $tag_id
 */
class ProductTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'tag_id'], 'required'],
            [['product_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
