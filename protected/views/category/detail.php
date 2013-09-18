<h1>
	<?php echo CHtml::encode($category->name) ?>
	<br /><small>$<?php echo number_format($total, 2) ?></small>
</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $data,
	'columns' => array(
		array(
			'name' => 'parent.date',
			'type' => 'date',
		),
		array(
			'name' => 'amount',
			'htmlOptions' => array('class' => 'r'),
		),
		'parent.account.name',
		'parent.notes_2',
		'notes',
		array(
			'name' => '',
			'type' => 'html',
			'value' => 'CHtml::link("edit", array("transaction/edit", "id" => $data->id))'
				.'." &nbsp; ".CHtml::link("view", array("transaction/view", "id" => $data->id))',
		),
	),
)); ?>