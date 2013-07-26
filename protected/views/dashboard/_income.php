<?php $form=$this->beginWidget('CActiveForm', array(
	'htmlOptions' => array(
		'class' => 'form-horizontal',
		'id' => 'income-form',
	),
)); ?>
	<div class="row">
		<div class="span6">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Gross Amount</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Email" class="input-small">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Net Amount</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Email" class="input-small">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Account</label>
				<div class="controls">
					<select class="input-medium"><option>select one</option></select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Date</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Email" class="input-small">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Notes</label>
				<div class="controls">
					<textarea rows="3"></textarea>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="row">
				<div class="span4 text-right">
					<select class="span1"></select>
				</div>
			</div>
			<div class="row">
				<div class="span2">
					<select class="span2"></select>
				</div>
				<div class="span2">
					<input type="text" class="span2">
				</div>
			</div>
			<div class="row">
				<div class="span2">
					<select class="span2"></select>
				</div>
				<div class="span2">
					<input type="text" class="span2">
				</div>
			</div>
			<div class="row">
				<div class="span2 text-right">
					Total:
				</div>
				<div class="span2">
					$1,000,000.00
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