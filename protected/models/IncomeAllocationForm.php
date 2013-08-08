<?php

class IncomeAllocationForm extends CFormModel
{
	public $category_id;
	public $amount;
	
	public function rules()
	{
		return array(
			array('amount, category_id', 'required'),
			array('category_id', 'exist', 'className' => 'Category', 'attributeName' => 'id'),
			array('amount','numerical'),
		);
	}
}