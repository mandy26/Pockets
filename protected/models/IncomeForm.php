<?php
class IncomeForm extends CFormModel
{
	protected $negative = false;
	public $split = true;

	public $id;
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
			array('id,notes', 'safe'),
			array('date', 'date', 'format' => 'yyyy-MM-dd'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'account_id' => 'Account',
		);
	}

	public function save()
	{
		if ($d = strtotime($this->date)) $this->date = date('Y-m-d', $d);
		if (!$this->validate() || !$this->allocations) return false;
		if ($this->id) $parent=Padre::model()->findByPk($this->id);
		else $parent=new Padre;
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
			if ($a->id) $t=Transaction::model()->findByPk($a->id);
			else $t=new Transaction;
			if (!$a->category_id && !$a->amount) {
				if (!$t->isNewRecord) $t->delete();
				continue;
			}
			$t->attributes = array(
				'category_id' => $a->category_id,
				'amount' => $a->amount * ($this->negative ? -1 : 1),
				'notes' => $a->notes,
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
			if (!$a->category_id && !$a->amount) continue;
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
