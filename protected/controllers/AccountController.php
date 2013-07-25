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
}