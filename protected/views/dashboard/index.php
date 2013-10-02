<div class="container">
	<div class="row">
		<div class="span2">
			<ul><?php foreach ($categories as $c)
			{ ?>
			<li>
				<?php echo CHtml::link('$'.number_format($c->balance, 2), array('category/detail', 'id' => $c->id)) ?>
				<?php echo CHtml::link(CHtml::encode($c->name), array('category/edit','id' => $c->id)) ?>				
			</li>
			<?php 
			} ?></ul>
			<?php echo CHtml::link('Add new Category', array('category/edit')) ?>
			
			
			
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
			<li>
				<?php echo CHtml::link(CHtml::encode($a->name), array('account/edit', 'id' => $a->id)) ?>
				<?php echo CHtml::link('$'.number_format($a->balance, 2), array('account/detail', 'id' => $a->id)) ?>				
			</li>
			<?php 
			} ?></ul>
			<?php echo CHtml::link('Add new Account', array('account/edit')) ?>
			
			<?php $this->renderPartial('_income',array ('trans' => $income, 'accounts' => $accounts, 
				'categories' => $categories)) ?>
		</div>
	</div>
</div>
