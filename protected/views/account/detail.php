<h1>
	<?php echo CHtml::encode($account->name) ?>
	<br /><small>$<?php echo number_format($total, 2) ?></small>
</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $data,
	'columns' => array(
		array(
			'name' => 'date',
			'type' => 'date',
		),
		array(
			'name' => 'net_amount',
			'htmlOptions' => array('class' => 'r'),
		),
		'notes_2',
		array(
			'name' => '',
			'type' => 'html',
			'value' => 'CHtml::link("edit", array("parent/edit", "id" => $data->id))'
				.'." &nbsp; ".CHtml::link("void",
					array("parent/void", "id" => $data->id),
					array("class" => "void"))',
		),
	),
));
ob_start();
?>
$('body').on('click', '.void', function() {
	if (confirm('Are you sure?')) $.post(this.href, function() {
		window.location.reload();
	});
	return false;
});
<?php
Yii::app()->clientScript->registerScript('account_detail', ob_get_clean());