<?php

class ParentController extends Controller
{

	public function actionEdit($id=false, $no=false)
	{
		$categories=Category::model()->findAll();
		$accounts=Account::model()->findAll();

		$postdata = null;
		if ($id)
		{
			$parent = Padre::model()->findByPk($id);
			if (!$parent) throw new CHttpException(404);
			if ($parent->net_amount < 0)
			{
				$form = new ExpenseForm;
				$form->attributes = array(
					'gross_amount' => -$parent->gross_amount,
					'net_amount' => -$parent->net_amount,
					'account_id' => $parent->account_id,
					'date' => $parent->date,
					'notes' => $parent->notes_2,
				);
			} else
			{
				$form = new IncomeForm;
				$form->attributes = array(
					'gross_amount' => $parent->gross_amount,
					'net_amount' => $parent->net_amount,
					'account_id' => $parent->account_id,
					'date' => $parent->date,
					'notes' => $parent->notes_2,
				);
			}
		} else if(isset($_POST['IncomeForm']))
		{
			$form = new IncomeForm;
		} else if(isset($_POST['ExpenseForm']))
		{
			$form = new ExpenseForm;
		}

		$form_type = get_class($form);
		if(isset($_POST[$form_type]))
		{
			$form->attributes=$_POST[$form_type];
			$form->allocations = array();
			if (isset($_POST['IncomeAllocationForm'])) foreach ($_POST['IncomeAllocationForm'] as $row)
			{
				if (!@$row['category_id'] && !@$row['amount']) continue;
				$a = new IncomeAllocationForm;
				$a->attributes = $row;
				if ($no)
				{
					$a->amount=$form->net_amount;
				}
				$form->allocations[] = $a;
			}

			if (!$no && $form->save())
			{
				$this->redirect(Yii::app()->homeUrl);
			}
			if (!$form->allocations && $form->net_amount)
			{
				$a = new IncomeAllocationForm;
				$a->amount=$form->net_amount;
				$form->allocations[] = $a;
				
			}
		}

		$this->pageTitle = substr($form_type, 0, -4);
		$this->render('edit', array(
			'accounts' => $accounts,
			'categories' => $categories,
			'expense' => $form,
		));
	}
	
	

	
}