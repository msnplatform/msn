<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_134145_create_charge_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('charge', [
            'id' => $this->primaryKey(),
            'code' => $this->string(32)->notNull(),
            'amount' => $this->integer(6)->notNull(),
            'currency' =>  $this->string(6)->notNull(),
            'archived' => $this->integer(2)->defaultValue(0)->notNull(),


            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);



    }

    public function down()
    {
        $this->dropTable('charge');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
