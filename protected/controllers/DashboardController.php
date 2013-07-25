<?php

class DashboardController extends Controller
{
	
	public function actionIndex()
	{
		$categories=Category::model()->findAll();
		$accounts=Account::model()->findAll();
		$this->render('index',array (
			'accounts' => $accounts,
			'categories' => $categories
		
		));
		
		
	}
	
	
	
		
		
	
	
	
		
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	
}