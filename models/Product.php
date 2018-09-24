<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $info
 * @property string $buy_price
 * @property string $default_price
 * @property int $stage_number
 *
 * @property ProductCategory $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['category_id', 'stage_number'], 'integer'],
            [['buy_price', 'default_price'], 'number'],
            [['name'], 'string', 'max' => 32],
            [['info'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'category_id' => Yii::t('app', 'Category ID'),
            'info' => Yii::t('app', 'Info'),
            'buy_price' => Yii::t('app', 'Buy Price'),
            'default_price' => Yii::t('app', 'Default Price'),
            'stage_number' => Yii::t('app', 'Stage Number'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }
}
