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
				.'." &nbsp; ".CHtml::link("view", array("parent/view", "id" => $data->id))',
		),
	),
)); ?>