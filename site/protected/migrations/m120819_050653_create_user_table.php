<?php

class m120819_050653_create_user_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{user}}', array(
            'id' => 'pk',
            'username' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'email' => 'string NOT NULL',
        ));
        $this->createIndex('user_email', '{{user}}', 'email');
        $this->createIndex('user_username', '{{user}}', 'username');
	}

	public function down()
	{
        $this->dropTable('{{user}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}