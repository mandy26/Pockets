<?php

class CategoryController extends Controller
{

	public function actionEdit($id=false) 
	{
		$category=new Category;
		if(isset($_POST['Category']))
		{
			$category->attributes=$_POST['Category'];
			if($category->save())
			{
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		$this->render('edit', array(
			'category' => $category,
		)); 
	}
}