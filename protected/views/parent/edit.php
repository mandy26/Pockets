<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'id' => 'split-form',
	),
)); ?>
<table>
	<tbody class="parent">
		<tr>
			<td class="<?php echo $expense->hasErrors('date') ? 'control-group error' : '' ?>">
				<?php echo $form->hiddenField($expense, 'id') ?>
				<?php echo $form->textField($expense, 'date', array('placeholder' => 'Date', 'class' => 'input-small')) ?>
			</td>
			<td class="<?php echo $expense->hasErrors('account_id') ? 'control-group error' : '' ?>">
				<?php echo $form->dropDownList($expense, 'account_id',
					CHtml::listData($accounts, 'id', 'name'), array(
					'class' => 'input-medium', 'prompt' => 'choose an account')) ?>
			</td>
			<td></td>
			<td class="<?php echo $expense->hasErrors('net_amount') ? 'control-group error' : '' ?>">
				<?php echo $form->textField($expense, 'net_amount', array('placeholder' => 'Net Amount', 'class' => 'input-small')) ?>
			</td>
			<td class="<?php echo $expense->hasErrors('notes') ? 'control-group error' : '' ?>">
				<?php echo $form->textField($expense, 'notes', array('placeholder' => 'Notes')) ?>
			</td>
			<td><?php echo $form->errorSummary(array($expense)) ?></td>
		</tr>
	</tbody>
	<tbody class="children">
	<?php $i=-1; foreach ($expense->allocations as $i => $a) split_row($form, $a, $i, $categories); ?>
	</tbody>
</table>
<button type="submit" class="btn">Save</button>
<?php $this->endWidget(); ?>

<table style="display:none"><tbody id="split-spare-row">
	<?php split_row($form, new IncomeAllocationForm, '{i}', $categories) ?>
</tbody></table>

<?php function split_row($form, $a, $i, $categories)
{ ?>
	<tr>
		<td colspan="2"<?php if ($i == '{i}') echo ' class="remainder"' ?>></td>
		<td class="<?php echo $a->hasErrors('category_id') ? 'control-group error' : '' ?>">
			<?php echo $form->hiddenField($a, "[$i]id") ?>
			<?php echo $form->dropDownList($a, "[$i]category_id",
				CHtml::listData($categories, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'choose a category')) ?>
		</td>
		<td class="<?php echo $a->hasErrors('amount') ? 'control-group error' : '' ?>">
			<?php echo $form->textField($a, "[$i]amount", array('placeholder' => 'Amount', 'class' => 'input-small amount')) ?>
		</td>
		<td class="<?php echo $a->hasErrors('notes') ? 'control-group error' : '' ?>">
			<?php echo $form->textField($a, "[$i]notes", array('placeholder' => 'Notes')) ?>
		</td>
		<td><?php echo $form->errorSummary(array($a)) ?></td>
	</tr>
<?php
}

ob_start(); ?>
	var split_row_number = <?php echo $i ?>;
	var show_remainder = function()
	{
		var sum = 0;
		jQuery('#split-form input.amount').each(function(i, el)
		{
			var value = Number(jQuery(el).val());
			if (value) sum += value;
		});
		var net = Number(jQuery('#ExpenseForm_net_amount').val());
		var remainder = (net ? net : 0) - sum;
		split_form.find('.remainder').text('Amount left: $'+remainder.toFixed(2));
	};
	var split_form = jQuery('#split-form').on('change', 'input.amount, #ExpenseForm_net_amount', function()
	{
		show_remainder();
	}).on('change', 'tr:last input, tr:last select', function()
	{
		split_form.find('.remainder').html('').removeClass('remainder');
		split_row_number++;
		var html = jQuery('#split-spare-row').html().replace(/\{i\}/g, split_row_number);
		var row = jQuery(html).appendTo('#split-form .children');
		show_remainder();
	});
	jQuery('#ExpenseForm_date').datepicker();
<?php
$split_rows_js = ob_get_clean();
Yii::app()->clientScript
	->registerScript('split_rows', $split_rows_js)
	->registerPackage('datepicker');