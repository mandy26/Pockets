<?php

class PresetController extends Controller
{

	public function actionEdit($id=false) 
	{
		$preset = new Preset;
		$preset->updated_items = $preset->items;
		if(isset($_POST['Preset']))
		{
			$preset->attributes=$_POST['Preset'];
			$preset->updated_items = array();
			foreach ($_POST['PresetItem'] as $row)
			{
				if (!@$row['category_id'] && !@$row['amount']) continue;
				$a = new PresetItem;
				$a->attributes = $row;
				$preset->updated_items[] = $a;
			}
			if ($preset->save()) {
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		if (!$preset->updated_items) $preset->updated_items[] = new PresetItem;

		$categories=Category::model()->findAll();
		$this->render('edit', array(
			'categories' => $categories,
			'preset' => $preset,
		));
	}

}