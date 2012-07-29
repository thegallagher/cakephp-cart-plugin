<h2><?php __('Dummy Express Checkout'); ?></h2>
<p>
	<?php echo __('Dummy express checkout process for demonstration purpose'); ?>
</p>
<?php
	echo $this->Form->create('Dummy');
	echo $this->Form->input('confirm', array(
		'type' => 'checkbox',
		'default' => 1));
	echo $this->Form->end(__('Pay', true));
?>