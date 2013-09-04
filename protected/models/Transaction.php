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
			array('amount, category_id', 'required'),
			array('category_id', 'exist', 'className' => 'Category', 'attributeName' => 'id'),
			array('amount','numerical'),
			array('notes','safe'),
		);
		
	}

	public function attributeLabels() {
		return array(
		);
	}

}