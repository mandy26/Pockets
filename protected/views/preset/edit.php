<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'id' => 'preset-form',
		'class' => 'form-horizontal',
	),
)); ?>
<table>
	<tbody class="parent">
		<tr>
			<td colspan="4">
				<div class="control-group <?php echo $preset->hasErrors('name') ? 'error' : '' ?>">
					<?php echo $form->label($preset, 'name', array('class' => 'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($preset, 'name', array('placeholder' => 'Name')) ?>
						<?php echo $form->error($preset, 'gross_amount') ?>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
	<tbody class="children">
	<?php $i=-1; foreach ($preset->updated_items as $i => $a) preset_row($form, $a, $i, $categories); ?>
	</tbody>
</table>
<button type="submit" class="btn">Save</button>
<?php $this->endWidget(); ?>

<table style="display:none"><tbody id="preset-spare-row">
	<?php preset_row($form, new PresetItem, '{i}', $categories) ?>
</tbody></table>

<?php function preset_row($form, $a, $i, $categories)
{ ?>
	<tr>
		<td class="<?php echo $a->hasErrors('category_id') ? 'control-group error' : '' ?>">
			<?php echo $form->hiddenField($a, "[$i]id") ?>
			<?php echo $form->dropDownList($a, "[$i]category_id",
				CHtml::listData($categories, 'id', 'name'), array(
				'class' => 'input-medium', 'prompt' => 'choose a category')) ?>
		</td>
		<td class="<?php echo $a->hasErrors('amount') ? 'control-group error' : '' ?>">
			<?php echo $form->textField($a, "[$i]amount", array('placeholder' => 'Amount', 'class' => 'input-small amount')) ?>
		</td>
		<td class="<?php echo $a->hasErrors('type') ? 'control-group error' : '' ?>">
			<?php echo $form->dropDownList($a, "[$i]type",
				array('gross' => 'Percent of gross', 'net' => 'Percent of net', 'absolute' => 'Absolute'), array(
				'class' => 'input-medium', 'prompt' => 'choose a type')) ?>
		</td>
		<td><?php echo $form->errorSummary(array($a)) ?></td>
	</tr>
<?php
}

ob_start(); ?>
	var preset_row_number = <?php echo $i ?>;
	jQuery('#preset-form').on('change', 'tr:last input, tr:last select', function()
	{
		preset_row_number++;
		var html = jQuery('#preset-spare-row').html().replace(/\{i\}/g, preset_row_number);
		jQuery(html).appendTo('#preset-form .children');
	});
<?php
$preset_rows_js = ob_get_clean();
Yii::app()->clientScript
	->registerScript('preset_rows', $preset_rows_js);