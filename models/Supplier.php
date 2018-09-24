<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%supplier}}".
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property string $payed
 * @property string $unpay
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%supplier}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['payed', 'unpay'], 'number'],
            [['name'], 'string', 'max' => 32],
            [['info'], 'string', 'max' => 255],
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
            'info' => Yii::t('app', 'Info'),
            'payed' => Yii::t('app', 'Payed'),
            'unpay' => Yii::t('app', 'Unpay'),
        ];
    }
}
