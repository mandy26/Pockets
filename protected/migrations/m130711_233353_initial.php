<?php

class m130711_233353_initial extends CDbMigration
{
	public function up()
	{
		$this->createTable('transaction', array(
			'id' => 'pk',
			'date' => 'date',
			'category_id' => 'integer',
			'amount' => 'decimal(10,2)',
			'account_id' => 'integer',
			'notes' => 'text',
			'parent_id' => 'integer',			
		));
		$this->createTable('category', array(
			'id' => 'pk',
			'name' => 'string',				
		));
		$this->createTable('account', array(
			'id' => 'pk',
			'name' => 'string',				
		));
	}

	public function down()
	{
		$this->dropTable('account');
		$this->dropTable('category');
		$this->dropTable('transaction');

	}

}