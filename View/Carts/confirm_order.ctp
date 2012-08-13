<h2><?php echo __('Review Your Order')?></h2>
<p>
	<?php 
		echo __('Please review your order and and click below to complete your payment.');
	?>
</p>
<?php //debug($cart); ?>

<h3><?php __('You must click on the "Complete my purchase" button below to complete your purchase'); ?></h3>
<?php 
	echo $this->Form->create('Checkout', array('url' => env('REQUEST_URI')));
	echo $this->Form->hidden('confirm_order', array('value' => 1));
	echo $this->Form->button('Cancel order', array(
		'class' => 'btn btn-danger',
		'type' => 'submit',
		'name' => 'cancel',
		'div' => false));
?>
 
<?php
	echo $this->Form->submit(__('Complete my order', true), array(
		'class' => 'btn btn-primary',
		'div' => false,
		'name' => 'complete',));
	echo $this->Form->end();
?>
<?php //debug($this->request); ?>

