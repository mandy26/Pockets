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

	public function actionDetail($id)
	{
		$category=Category::model()->findByPk($id);
		if(!$category) throw new CHttpException(404, 'category not found');

		$sort = new CSort();
		$sort->defaultOrder = array('parent.date' => CSort::SORT_DESC);
		$sort->attributes = array(
			'parent.date',
			'amount',
			'parent.account.name' => array(
				'asc' => 'account.name',
				'desc' => 'account.name desc',
			),
			'parent.notes_2',
			'notes',
		);

		$criteria = new CDbCriteria(array(
			'with' => 'parent.account',
			'condition' => 'category_id=:c AND parent.void=0',
			'params' => array(':c' => $id),
		));

		$sum_criteria = new CDbCriteria(array(
			'select' => 'sum(amount) as amount',
		));
		$sum_criteria->mergeWith($criteria);

		$sum_result = Transaction::model()->find($sum_criteria);
		$total = $sum_result ? $sum_result->amount : 0;

		$this->render('detail', array(
			'category' => $category,
			'data' => new CActiveDataProvider('Transaction', array(
				'sort' => $sort,
				'criteria' => $criteria,
			)),
			'total' => $total,
		));
	}
}