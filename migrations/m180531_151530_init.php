<?php

use yii\db\Migration;

/**
 * Class m180531_151530_init
 */
class m180531_151530_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180531_151530_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180531_151530_init cannot be reverted.\n";

        return false;
    }
    */
}
