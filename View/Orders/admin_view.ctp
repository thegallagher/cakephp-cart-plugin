<h2><?php echo __('Your order #%s', $order['Order']['id']); ?></h2>

<dl>
	<dt><?php echo __('Invoice Number'); ?></dt>
	<dd><?php echo h($order['Order']['invoice_number']); ?></dd>
	<dt><?php echo __('Total'); ?></dt>
	<dd><?php echo h($order['Order']['total']); ?></dd>
	<dt><?php echo __('Created'); ?></dt>
	<dd><?php echo h($order['Order']['created']); ?></dd>
	<dt><?php echo __('Payment Method'); ?></dt>
	<dd><?php echo h($order['Order']['processor']); ?></dd>
</dl>

<?php
	//debug($orderItems);
	//debug($order);
	//debug($this->layout);
?>

<h3><?php echo __('Ordered Items'); ?></h3>

<table class="table table-striped table-bordered table-condensed">
	<tr>
		<th><?php echo $this->Paginator->sort('OrderItem.quantity', __('Quantity')); ?></th>
		<th><?php echo $this->Paginator->sort('OrderItem.name', __('Name')); ?></th>
		<th><?php echo $this->Paginator->sort('OrderItem.price', __('Price')); ?></th>
		<th><?php echo $this->Paginator->sort('OrderItem.virtual', __('Virtual')); ?></th>
	</tr>
	<?php foreach ($orderItems as $item) : ?>
		<tr>
			<td>
				<?php echo h($item['OrderItem']['quantity']); ?>
			</td>
			<td>
				<?php echo h($item['OrderItem']['name']); ?>
			</td>
			<td>
				<?php echo h($item['OrderItem']['price']); ?>
			</td>
			<td>
				<?php
					if ($item['OrderItem']['virtual'] == 1) {
						echo __('Yes');
					} else {
						echo __('No');
					}
				?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>