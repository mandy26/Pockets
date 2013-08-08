<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'class' => 'form-horizontal',
	),
)); ?>
	<?php echo $form->errorSummary($category); ?>

	<div class="control-group">
		<?php echo $form->label($category, 'name', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($category, 'name', array('placeholder' => 'Name')) ?>
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Save</button>
		</div>
	</div>
<?php $this->endWidget(); ?>