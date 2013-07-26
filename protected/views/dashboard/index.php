<div class="container">
	<div class="row">
		<div class="span2">
			<ul><?php foreach ($categories as $c)
			{ ?>
			<li><?php echo CHtml::link(CHtml::encode($c->name), 
				array ('category/edit','id' => $c->id)) ?></li>
			<?php 
			} ?></ul>
			
			
			
		</div>
		<div class="span10">
			another something
			
			<ul><?php foreach ($accounts as $a)
			{ ?>
			<li><?php echo CHtml::link(CHtml::encode($a->name), 
				array ('account/edit','id' => $a->id)) ?></li>
			<?php 
			} ?></ul>
			
			<?php $this->renderPartial('_income') ?>
		</div>
	</div>
</div>
