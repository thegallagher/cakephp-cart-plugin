<h2><?php echo __d('cart', 'Orders'); ?></h2>

<?php
	echo $this->Form->create();
	echo $this->Form->input('invoice_number', array(
		'label' => __('Invoice Number')));
	echo $this->Form->input('total', array(
		'label' => __('Total')));
	echo $this->Form->input('username', array(
		'label' => __('Username')));
	echo $this->Form->input('email', array(
		'label' => __('Email')));
	echo $this->Form->end(__d('cart', 'Search'));
?>

<?php if (!empty($orders)) : ?>
	<table>
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('order_number'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th>-</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($orders as $order) : ?>
				<tr>
					<td>
						<?php
							echo $this->Html->link($order['Order']['id'], array(
								'action' => 'view', $order['Order']['id']));
						?>
					</td>
					<td><?php echo $order['Order']['total']; ?></td>
					<td><?php echo $order['Order']['order_number']; ?></td>
					<td><?php echo $order['Order']['created']; ?></td>
					<td><?php echo $this->Html->link(__d('cart', 'view'), array('action' => 'view', $order['Order']['id'])); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<p><?php echo __d('cart', 'No orders'); ?></p>
<?php endif; ?>