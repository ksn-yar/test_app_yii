<?php

class m160824_162032_create_images extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m160824_162032_create_images does not support migration down.\n";
//		return false;
//	}

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('images', [
			'id' => 'pk',
			'filename' => 'string NOT NULL',
			'name' => 'string NOT NULL',
			'password' => 'string NOT NULL',
			'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
			'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);
	}

	public function safeDown()
	{
		$this->delete('images');
	}
}