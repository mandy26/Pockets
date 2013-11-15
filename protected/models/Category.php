<?php

class Category extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'category';
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
			'balance'=>array(self::STAT, 'Transaction', 'category_id', 'select' => 'sum(amount)',
				'join' => 'JOIN parent on parent.id=t.parent_id',
				'condition' => 'parent.void=0'),
		);
	}

}