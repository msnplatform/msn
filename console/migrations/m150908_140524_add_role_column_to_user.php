<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_140524_add_role_column_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('user','role',$this->integer(6)->notNull());
    }

    public function down()
    {
        $this->dropColumn('user', 'role');
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
