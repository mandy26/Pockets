<?php

class m131115_020427_parent_void extends CDbMigration
{
	public function up()
	{
		$this->addColumn('parent','void','boolean default 0');
	}

	public function down()
	{
		$this->dropColumn('parent','void');
	}

}