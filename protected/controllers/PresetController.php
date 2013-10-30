<?php

class PresetController extends Controller
{
	public function actionIndex()
	{
		$presets = Preset::model()->findAll();
		$this->render('index', array(
			'presets' => $presets,
		));
	}

	public function actionEdit($id=false) 
	{
		if ($id)
		{
			$preset = Preset::model()->findByPk($id);
			if (!$preset) throw new CHttpException(404);
		}
		else
		{
			$preset = new Preset;
		}
		$preset->updated_items = $preset->items;
		if (isset($_POST['Preset']))
		{
			$preset->attributes=$_POST['Preset'];
			$preset->updated_items = array();
			foreach ($_POST['PresetItem'] as $row)
			{
				if (!@$row['category_id'] && !@$row['amount']) continue;
				if (@$row['id'])
				{
					$a = PresetItem::model()->findByPk($row['id']);
					if (!$a) $a = new PresetItem;
				}
				else $a = new PresetItem;
				$a->attributes = $row;
				$preset->updated_items[] = $a;
			}
			if ($preset->save()) {
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		$preset->updated_items[] = new PresetItem;

		$categories=Category::model()->findAll();
		$this->render('edit', array(
			'categories' => $categories,
			'preset' => $preset,
		));
	}

}