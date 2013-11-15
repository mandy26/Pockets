<?php

class AccountController extends Controller
{

	public function actionEdit($id=false) 
	{
		if($id===false)
		{
			$account=new Account;
		}
		else
		{
			$account=Account::model()->findByPk($id);
			if(!$account) throw new CHttpException (404,'account not found');
		}
		if(isset($_POST['Account']))
		{
			$account->attributes=$_POST['Account'];
			if($account->save())
			{
				$this->redirect(Yii::app()->homeUrl);
			}
		}
		$this->render('edit', array(
			'account' => $account,
		)); 
	}
	
	public function actionDetail($id)
	{
		$account=Account::model()->findByPk($id);
		if(!$account) throw new CHttpException(404, 'account not found');

		$sort = new CSort();
		/*$sort->attributes = array(
			'parent.date',
			'amount',
			'parent.account.name' => array(
				'asc' => 'account.name',
				'desc' => 'account.name desc',
			),
			'parent.notes_2',
			'notes',
		);*/

		$criteria = new CDbCriteria(array(
			//'with' => 'parent.account',
			'condition' => 'account_id=:c AND void=0',
			'params' => array(':c' => $id),
		));

		$sum_criteria = new CDbCriteria(array(
			'select' => 'sum(net_amount) as net_amount',
		));
		$sum_criteria->mergeWith($criteria);

		$sum_result = Padre::model()->find($sum_criteria);
		$total = $sum_result ? $sum_result->net_amount : 0;

		$this->render('detail', array(
			'account' => $account,
			'data' => new CActiveDataProvider('Padre', array(
				'sort' => array(
					'defaultOrder' => array('date' => CSort::SORT_DESC),
				),
				'criteria' => $criteria,
			)),
			'total' => $total,
		));
	}
}