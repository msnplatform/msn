<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_140103_create_user_parent_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user_parent', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'parent_id' => $this->integer(11)->notNull(),
            'relationship' => $this->integer(6),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('user_parent');
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
