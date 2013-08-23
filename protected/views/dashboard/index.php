<div class="container">
	<div class="row">
		<div class="span2">
			<ul><?php foreach ($categories as $c)
			{ ?>
			<li>$<?php echo $c->balance ?> <?php echo CHtml::link(CHtml::encode($c->name), 
				array ('category/edit','id' => $c->id)) ?></li>
			<?php 
			} ?></ul>
			
			
			
		</div>
		<div class="span10">
			<?php $this->renderPartial('_expense',array ('trans' => $expense, 'accounts' => $accounts, 
				'categories' => $categories))?>
			
			<form class="form-search">
				<input type="text" class="input-medium search-query">
				<button type="submit" class="btn">Search</button>
			</form>

			<ul><?php foreach ($accounts as $a)
			{ ?>
			<li><?php echo CHtml::link(CHtml::encode($a->name), 
				array ('account/edit','id' => $a->id)) ?> $<?php echo $a->balance ?> </li>
			<?php 
			} ?></ul>
			
			<?php $this->renderPartial('_income',array ('trans' => $income, 'accounts' => $accounts, 
				'categories' => $categories)) ?>
		</div>
	</div>
</div>
