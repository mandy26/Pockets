<?php

class IncomeAllocationForm extends CFormModel
{
	public $id;
	public $category_id;
	public $amount;
	public $notes;
	
	public function rules()
	{
		return array(
			array('amount, category_id', 'required'),
			array('category_id', 'exist', 'className' => 'Category', 'attributeName' => 'id'),
			array('amount','numerical'),
			array('id, notes','safe'),
		);
	}

	public function attributeLabels() {
		return array(
			'category_id' => 'Category',
		);
	}
}