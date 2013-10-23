<?php

class PresetItem extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'preset_item';
    }

	public function rules()
	{
		return array(
			array('type, amount, category_id', 'required'),
			array('preset_id', 'exist', 'className' => 'Preset', 'attributeName' => 'id'),
			array('category_id', 'exist', 'className' => 'Category', 'attributeName' => 'id'),
			array('amount', 'numerical'),
			array('type', 'in', 'range' => array('net', 'gross', 'absolute')),
		);
		
	}

	public function relations()
	{
		return array(
			'preset' => array(self::BELONGS_TO,'Preset','preset_id'),
			);
	}

	public function attributeLabels() {
		return array(
		);
	}

}