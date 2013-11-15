<?php

class Account extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
 
	public function tableName()
	{
		return 'account';
	}
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'unique'),
		);
		
	}

	public function relations()
	{
		return array(
			'balance'=>array(self::STAT, 'Padre', 'account_id', 'select' => 'sum(net_amount)',
				'condition' => 'void=0'),
		);
	}

}