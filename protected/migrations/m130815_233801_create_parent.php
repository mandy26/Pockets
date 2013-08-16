<?php

class m130815_233801_create_parent extends CDbMigration
{
	public function up()
	{
		$this->createTable('parent', array(
			'id' => 'pk',
			'date' => 'date',
			'net_amount' => 'decimal(10,2)',
			'gross_amount' => 'decimal(10,2)',
			'account_id' => 'integer',
			'notes_2' => 'text',		
		));
		
		$this->dropColumn('transaction', 'date');
		$this->dropColumn('transaction', 'account_id');
		
	}

	public function down()
	{
		$this->addColumn('transaction', 'date', 'date');
		$this->addColumn('transaction', 'account_id', 'integer');
		$this->dropTable('parent');
	}

}