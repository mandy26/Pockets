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

	public function attributeLabels()
	{
		return array(
			'account_id' => 'Account',
		);
	}

	public function init()
	{
		$this->allocations[] = new IncomeAllocationForm;
	}

	public function save()
	{
		if (!$this->validate() || !$this->allocations) return false;
		$parent_id = null;
		foreach ($this->allocations as $a)
		{
			$t=new Transaction;
			$t->attributes = array(
				'date' => $this->date,
				'category_id' => $a->category_id,
				'amount' => $a->amount,
				'account_id' => $this->account_id,
				'notes' => $this->notes,
			);
			$t->parent_id = $parent_id;
			$t->save();
			if (!$parent_id) $parent_id = $t->id;
		}
		return true;
	}

	public function validate($attributes = null, $clearErrors = true) {
		if (!parent::validate($attributes, $clearErrors)) return false;
		foreach ($this->allocations as $a)
		{
			if (!$a->validate()) return false;
		}
		return true;
	}

}
