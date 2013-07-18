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
}