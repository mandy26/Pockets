<?php

class m131023_003946_presets extends CDbMigration
{
	public function up()
	{
		$this->createTable('preset', array(
			'id' => 'pk',
			'name' => 'string',
		));
		$this->createTable('preset_item', array(
			'id' => 'pk',
			'preset_id' => 'integer',
			'type' => 'string',
			'amount' => 'decimal(10,2)',
			'category_id' => 'integer',
		));
	}

	public function down()
	{
		$this->dropTable('preset_item');
		$this->dropTable('preset');
	}

}