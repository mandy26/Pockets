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
			<?php foreach ($trans->allocations as $i => $a) income_row($form, $a, $i, $categories); ?>
			<div class="row">
				<div class="span2 text-right">
					Total:
				</div>
				<div class="span2 sum">
					$<?php echo number_format ($trans->sum (), 2) ?>
				</div>
			</div>
			<div class="row">
				<div class="span2 text-right">
					Remainder:
				</div>
				<div class="span2 remainder">
					$<?php echo number_format ($trans->net_amount - $trans->sum (), 2) ?>
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

<div id="income-spare-row" style="display:none"><?php income_row($form, new IncomeAllocationForm, '{i}', $categories) ?></div>

<?php
function income_row($form, $a, $i, $categories) {
	?>
	<div class="row income-item">
		<div class="span2 <?php echo $a->hasErrors('category_id') ? 'control-group error' : '' ?>">
			<?php echo $form->dropDownList($a, "[$i]category_id",
				CHtml::listData($categories, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'Pick me!')) ?>
			<?php echo $form->error($a, 'category_id') ?>
		</div>
		<div class="span2 <?php echo $a->hasErrors('amount') ? 'control-group error' : '' ?>">
			<?php echo $form->textField($a, "[$i]amount", array('placeholder' => 'Amount', 
				'class' => 'span2 amount')) ?>
			<?php echo $form->error($a, 'amount') ?>
		</div>
	</div>
	<?php
}


ob_start(); ?>
	var income_row_number = <?php echo $i ?>;
	jQuery('#income-form').on('focus', '.income-item:last', function() {
		income_row_number++;
		var html = jQuery('#income-spare-row').html().replace(/\{i\}/g, income_row_number);
		jQuery('#income-form .income-item:last').after(html);
	}).on('change', 'input.amount, #IncomeForm_net_amount', function() {
		var sum = 0;
		jQuery('#income-form input.amount').each(function(i, el) {
			var value = Number(jQuery(el).val());
			if (value) sum += value;
		});
		jQuery('#income-form .sum').text('$'+sum.toFixed(2));
		var net = Number(jQuery('#IncomeForm_net_amount').val());
		var remainder = (net ? net : 0) - sum;
		jQuery('#income-form .remainder').text('$'+remainder.toFixed(2));
	});
<?php
$income_rows_js = ob_get_clean();
Yii::app()->clientScript->registerScript('income_rows', $income_rows_js);