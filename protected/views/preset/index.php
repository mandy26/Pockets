<ul>
<?php foreach ($presets as $preset) echo '<li>'.CHtml::link(CHtml::encode($preset->name), 
	array ('preset/edit','id' => $preset->id)).'</li>' ?>
</ul>