<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'class' => 'form-inline',
		'id' => 'expense-form',
	),
)); ?>
	<div class="row">
		<div class="span10">
			<input type="text" class="input-small" placeholder="Date">
			<?php echo $form->dropDownList($trans, 'category_id',
				CHtml::listData($categories, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'Pick me!')) ?>
			<input type="text" class="input-xlarge" placeholder="Notes">
		</div>	
	</div>
	<div class="row">
		<div class="span10">
			<input type="text" class="input-small" placeholder="Amount">
			<?php echo $form->dropDownList($trans, 'account_id',
				CHtml::listData($accounts, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'Pick me!')) ?>
		</div>	
	</div>

	<hr>
	
	<div class="row">
		<div class="span10">
			<select class="input-medium"><option>select category</option></select>
			<input type="text" class="input-small" placeholder="Amount">
			<input type="text" class="input-xlarge" placeholder="Notes">
		</div>
	</div>
	<div class="row">
		<div class="span10">
			Remainder: $$
		</div>
	</div>
<?php $this->endWidget(); ?>