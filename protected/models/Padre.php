<?php

class Padre extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'parent';
    }

	public function rules()
	{
		return array(
			array('net_amount, date, account_id', 'required'),
			array('account_id', 'exist', 'className' => 'Account', 'attributeName' => 'id'),
			array('net_amount, gross_amount','numerical'),
			array('notes_2', 'safe'),
		);
		
	}

	public function relations()
	{
		return array(
			'account' => array (self::BELONGS_TO,'Account','account_id'),
			);
	}

	public function attributeLabels() {
		return array(
		);
	}

}