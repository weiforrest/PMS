<?php

use yii\db\Migration;

/**
 * Class m180922_124304_supplier
 */
class m180922_124304_supplier extends Migration
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
        $this->createTable('{{%supplier}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'info' => $this->string(),
            'payed' => $this->decimal(10,2)->defaultValue(0),
            'unpay' => $this->decimal(10,2)->defaultValue(0),
        ], $tableOptions);

    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable('{{%supplier}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180922_124304_supplier cannot be reverted.\n";

        return false;
    }
    */
}
