<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'class' => 'form-inline',
		'id' => 'expense-form',
	),
)); ?>
<?php if ($error=$form->errorSummary(array($trans, $trans->allocations[0])))
{ ?>	
	<div class="row">
		<div class="span10">
			<?php echo $error ?>
		</div>
	</div>
<?php } ?>
	<div class="row">
		<div class="span10">
			<?php echo $form->textField($trans, 'date', array('placeholder' => 'Date',
				'class' => 'input-small')) ?>
			<?php echo $form->dropDownList($trans, 'account_id',
				CHtml::listData($accounts, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'choose an account')) ?>			
			<?php echo $form->textField($trans, 'notes', array('placeholder' => 'Notes',
				'class' => 'input-xlarge')) ?>
		</div>	
	</div>
	<div class="row">
		<div class="span10">
			<?php echo $form->textField($trans, 'net_amount', array('placeholder' => 'Amount',
				'class' => 'input-small')) ?>
			<?php echo $form->dropDownList($trans->allocations[0], '[0]category_id',
				CHtml::listData($categories, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'choose a category')) ?>
			<?php echo CHtml::link('Split', '/dashboard/split/no/submit', array('id' => 'expense-link')) ?>
			<input type="submit" class="btn">
		</div>	
	</div>
	
<?php $this->endWidget(); ?>
	
<?php ob_start(); ?>
	jQuery('#ExpenseForm_date').datepicker();
	jQuery('#expense-link').click(function()
	{
		jQuery('#expense-form').attr('action',this.href).submit();
		return false;
	});
<?php
$expense_js = ob_get_clean();
Yii::app()->clientScript
	->registerScript('expense', $expense_js)
	->registerPackage('datepicker');

