<?php

class DashboardController extends Controller
{
	
	public function actionIndex()
	{
		$categories=Category::model()->findAll();
		$accounts=Account::model()->findAll();
		$expense=new Transaction;

		$income=new IncomeForm;
		if(isset($_POST['IncomeForm']))
		{
			$income->attributes=$_POST['IncomeForm'];
			$income->allocations = array();
			foreach ($_POST['IncomeAllocationForm'] as $row) {
				$a = new IncomeAllocationForm;
				$a->attributes = $row;
				$a->validate();
				$income->allocations[] = $a;
			}
			$income->validate();
		}

		$this->render('index',array (
			'accounts' => $accounts,
			'categories' => $categories,
			'expense' => $expense,
			'income' => $income
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