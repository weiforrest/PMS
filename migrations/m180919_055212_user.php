<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m180919_055212_user
 */
class m180919_055212_user extends Migration
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
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string(),
            'auth_key' => $this->string(32),
            'access_token' => $this->string(40),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'logged_at' => $this->integer()
        ], $tableOptions);

        // add the admin user
        $admin_user = new User();
        $admin_user->username = 'admin';
        $admin_user->setPassword('admin');
        $admin_user->generateAuthKey();
        $admin_user->save();


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180919_055212_user cannot be reverted.\n";

        return false;
    }
    */
}
