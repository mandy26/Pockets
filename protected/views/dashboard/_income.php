<?php $form=$this->beginWidget('CActiveForm', array(
	'errorMessageCssClass' => 'help-inline',
	'htmlOptions' => array(
		'class' => 'form-horizontal',
		'id' => 'income-form',
	),
)); ?>
	<div class="row">
		<div class="span6">
			<div class="control-group <?php echo $trans->hasErrors('gross_amount') ? 'error' : '' ?>">
				<?php echo $form->label($trans, 'gross_amount', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($trans, 'gross_amount', array('placeholder' => 'Amount', 
						'class' => 'input-small')) ?>
					<?php echo $form->error($trans, 'gross_amount') ?>
				</div>
			</div>
			<div class="control-group <?php echo $trans->hasErrors('net_amount') ? 'error' : '' ?>">
				<?php echo $form->label($trans, 'net_amount', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($trans, 'net_amount', array('placeholder' => 'Amount',
						'class' => 'input-small')) ?>
					<?php echo $form->error($trans, 'net_amount') ?>
				</div>
			</div>
			<div class="control-group <?php echo $trans->hasErrors('account_id') ? 'error' : '' ?>">
				<?php echo $form->label($trans, 'account_id', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $form->dropDownList($trans, 'account_id',
						CHtml::listData($accounts, 'id', 'name'), array(
						'class' => 'input-medium', 'prompt' => 'Mandy please!')) ?>
					<?php echo $form->error($trans, 'account_id') ?>
				</div>
			</div>
			<div class="control-group <?php echo $trans->hasErrors('date') ? 'error' : '' ?>">
				<?php echo $form->label($trans, 'date', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $form->textField($trans, 'date', array('placeholder' => 'Date',
						'class' => 'input-small')) ?>
					<?php echo $form->error($trans, 'date') ?>
				</div>
			</div>
			<div class="control-group <?php echo $trans->hasErrors('notes') ? 'error' : '' ?>">
				<?php echo $form->label($trans, 'notes', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo $form->textArea($trans, 'notes', array('placeholder' => 'Notes',
						'rows' => '3')) ?>
					<?php echo $form->error($trans, 'notes') ?>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="row">
				<div class="span4 text-right">
					<select class="span1"></select>
				</div>
			</div>
			<?php foreach ($trans->allocations as $i => $a)
			{ ?>
			<div class="row">
				<div class="span2">
					<?php echo $form->dropDownList($a, "[$i]category_id",
						CHtml::listData($categories, 'id', 'name'), array(
						'class' => 'input-medium', 'prompt' => 'Pick me!')) ?>
					<?php echo $form->error($a, 'category_id') ?>
				</div>
				<div class="span2">
					<?php echo $form->textField($a, "[$i]amount", array('placeholder' => 'Amount', 
						'class' => 'span2')) ?>
					<?php echo $form->error($a, 'amount') ?>
				</div>
			</div>
			<?php 
			} ?>
			<div class="row">
				<div class="span2 text-right">
					Total:
				</div>
				<div class="span2">
					$1,000,000.00
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span10 text-right">
			<input type="submit" class="btn">
		</div>
	</div>
<?php $this->endWidget(); ?>