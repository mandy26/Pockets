<?php
class IncomeForm extends CFormModel
{
	protected $negative = false;
	public $split = true;

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
			array('date', 'date', 'format' => 'yyyy-MM-dd'),
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
		if ($d = strtotime($this->date)) $this->date = date('Y-m-d', $d);
		if (!$this->validate() || !$this->allocations) return false;
		$parent=new Padre;
		$parent->attributes = array(
				'date' => $this->date,
				'net_amount' => $this->net_amount * ($this->negative ? -1 : 1),
				'gross_amount' => $this->gross_amount * ($this->negative ? -1 : 1),
				'account_id' => $this->account_id,
				'notes_2' => $this->notes,
			);
		$parent->save();
		$parent_id = $parent->id;
		foreach ($this->allocations as $a)
		{
			$t=new Transaction;
			$t->attributes = array(
				'category_id' => $a->category_id,
				'amount' => $a->amount * ($this->negative ? -1 : 1),
				'notes' => $this->notes,
			);
			$t->parent_id = $parent_id;
			$t->save();
		}
		return true;
	}

	public function validate($attributes = null, $clearErrors = true) 
	{
		$success = true;
		if (!parent::validate($attributes, $clearErrors)) $success = false;
		$sum=0;
		foreach ($this->allocations as $a)
		{
			$sum+=$a->amount;
			if (!$a->validate($this->split ? null : array('category_id'))) $success = false;
		}
		if ($sum!=$this->net_amount) 
		{
			$this->addError('net_amount', 'Sum does not equal net amount');
			$success = false;
		}
		return $success;
	}

	public function sum()
	{
		$sum=0;
		foreach ($this->allocations as $a) $sum+=$a->amount;
		return $sum;	
	}
}
