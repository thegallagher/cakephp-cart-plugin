<h2>Refund Order</h2>

<?php
	echo $this->Form->create();
	echo $this->Form->input('complete_refund', array(
		'type' => 'checkbox'));
	echo $this->Form->input('amount');
	echo $this->Form->submit(__('Refund'));
	echo $this->Form->end();
?>