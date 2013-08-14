<?php

class Transaction extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'transaction';
    }
	public function rules()
	{
		return array(
			array('amount, date, account_id, category_id', 'required'),
			array('category_id', 'exist', 'className' => 'Category', 'attributeName' => 'id'),
			array('account_id', 'exist', 'className' => 'Account', 'attributeName' => 'id'),
			array('amount','numerical'),
		);
		
	}

	public function attributeLabels() {
		return array(
		);
	}

}