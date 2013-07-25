<?php

class CategoryController extends Controller
{

	public function actionEdit($id=false) 
	{
		if($id===false)
		{
			$category=new Category;
		} else
		{
			$category=Category::model()->findByPk($id);
			if(!$category) throw new CHttpException (404,'category not found');
		}
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