<?php

use yii\db\Migration;

/**
 * Class m180922_131044_product
 */
class m180922_131044_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'info' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'category_id' => $this->integer(),
            'info' => $this->string(),
            'buy_price' => $this->decimal(10,2)->defaultValue(0),
            'default_price' => $this->decimal(10,2)->defaultValue(0),
            'stage_number' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->addForeignKey('fk_product_category', '{{%product}}', 'category_id','{{%product_category}}', 'id','cascade','cascade');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_product_category', '{{%product}}') || 
        $this->dropTable('{{%product}}') || $this->dropTable('{{%product_category}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180922_131044_product cannot be reverted.\n";

        return false;
    }
    */
}
