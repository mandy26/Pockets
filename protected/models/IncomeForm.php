<?php
class IncomeForm extends CFormModel
{
 	public $gross_amount;
	public $net_amount;
	public $account_id;
	public $date;
	public $notes;
	public $allocations = array();

	public function rules()
	{
		return array(
			array('net_amount, account_id, date', 'required'),
			array('gross_amount, net_amount', 'numerical'),
			array('notes', 'safe'),
		);
	}

	public function attributeLabels() {
		return array(
			'account_id' => 'Account',
		);
	}

	public function init() {
		$this->allocations[] = new IncomeAllocationForm;
	}

}
