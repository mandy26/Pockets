<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'class' => 'form-horizontal',
	),
)); ?>
	<?php echo $form->errorSummary($account); ?>

	<div class="control-group">
		<?php echo $form->label($account, 'name', array('class' => 'control-label', 'bar' => 'foo')); ?>
		<div class="controls">
			<?php echo $form->textField($account, 'name', array('placeholder' => 'Name')) ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Save</button>
		</div>
	</div>
<?php $this->endWidget(); ?>