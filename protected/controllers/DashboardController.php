<?php

class DashboardController extends Controller
{
	
	public function actionIndex()
	{
		$categories=Category::model()->findAll();
		$accounts=Account::model()->findAll();
		$expense=new ExpenseForm;
		$expense->split = false;
		if(isset($_POST['ExpenseForm']))
		{
			$expense->attributes=$_POST['ExpenseForm'];
			$expense->allocations = array();
			foreach ($_POST['IncomeAllocationForm'] as $row) {
				$a = new IncomeAllocationForm;
				$a->attributes = $row;
				$a->amount = $expense->net_amount;
				$expense->allocations[] = $a;
			}
			if ($expense->save()) {
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		if (!$expense->allocations) $expense->allocations[] = new IncomeAllocationForm;

		$income=new IncomeForm;
		if(isset($_POST['IncomeForm']))
		{
			$income->attributes=$_POST['IncomeForm'];
			$income->allocations = array();
			foreach ($_POST['IncomeAllocationForm'] as $row) {
				if (!@$row['category_id'] && !@$row['amount']) continue;
				$a = new IncomeAllocationForm;
				$a->attributes = $row;
				$income->allocations[] = $a;
			}
			if ($income->save()) {
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		if (!$income->allocations) $income->allocations[] = new IncomeAllocationForm;

		$this->render('index',array (
			'accounts' => $accounts,
			'categories' => $categories,
			'expense' => $expense,
			'income' => $income,
		));
		
		
	}
	
	public function actionSplit($no=false)
	{
		$categories=Category::model()->findAll();
		$accounts=Account::model()->findAll();
		$expense=new ExpenseForm;

		if(isset($_POST['ExpenseForm']))
		{
			$expense->attributes=$_POST['ExpenseForm'];
			$expense->allocations = array();
			if (isset($_POST['IncomeAllocationForm'])) foreach ($_POST['IncomeAllocationForm'] as $row)
			{
				if (!@$row['category_id'] && !@$row['amount']) continue;
				$a = new IncomeAllocationForm;
				$a->attributes = $row;
				if ($no)
				{
					$a->amount=$expense->net_amount;
				}
				$expense->allocations[] = $a;
			}

			if (!$no && $expense->save())
			{
				$this->redirect(Yii::app()->homeUrl);
			}
			if (!$expense->allocations && $expense->net_amount)
			{
				$a = new IncomeAllocationForm;
				$a->amount=$expense->net_amount;
				$expense->allocations[] = $a;
				
			}
		}

		$this->render('split', array(
			'accounts' => $accounts,
			'categories' => $categories,
			'expense' => $expense,
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