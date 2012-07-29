<h2><?php echo __('Buy Items for a user'); ?></h2>

<?php
	echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('email');
	echo $this->Form->submit(__('Submit'));
	echo $this->Form->end();
?>