<?php

class AccountController extends Controller
{

	public function actionEdit($id=false) 
	{
		$account=new Account;
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