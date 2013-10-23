<?php

class Preset extends CActiveRecord
{
	public $updated_items = array();

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'preset';
    }

	public function rules()
	{
		return array(
			array('name', 'required'),
		);
	}

	public function relations()
	{
		return array(
			'items' => array(self::HAS_MANY,'PresetItem','preset_id'),
			);
	}

	public function validate($attributes=NULL, $clearErrors=true)
	{
		$valid = parent::validate($attributes, $clearErrors);
		foreach ($this->updated_items as $item) $valid = $item->validate() && $valid;
		return $valid;
	}

	protected function afterSave()
	{
		parent::afterSave();
		foreach ($this->updated_items as $item)
		{
			$item->preset_id = $this->id;
			$item->save();
		}
	}

}