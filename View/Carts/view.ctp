<?php //debug($cart); ?>

<h2>
	<?php echo __d('cart', 'Shopping Cart'); ?>
</h2>

<?php if (!empty($cart['CartsItem'])) : ?>
	<?php echo $this->Form->create('Cart'); ?>
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
					<th><?php echo __d('cart', 'Item'); ?></th>
					<th><?php echo __d('cart', 'Price'); ?></th>
					<th><?php echo __d('cart', 'Quantity'); ?></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($cart['CartsItem'] as $key => $item) : ?>
					<tr>
						<td><?php echo h($item['name']); ?></td>
						<td><?php echo CakeNumber::currency($item['total']); ?></td>
						<td>
							<?php
								if ($item['quantity_limit'] != 1) {
									echo $this->Form->input('CartsItem.' . $key . '.quantity', array(
										'div' => false,
										'label' => false,
										'default' => $item['quantity'],
										'class' => 'input-small'));
								} else {
									echo ' ' . $item['quantity_limit'] . ' ';
								}
								echo $this->Form->hidden('CartsItem.' . $key . '.model');
								echo $this->Form->hidden('CartsItem.' . $key . '.foreign_key');
							?>
						</td>
						<td>
							<?php
								echo $this->Html->link(__d('cart', 'remove'), array(
									'action' => 'remove_item',
									'id' => $item['foreign_key'],
									'model' => $item['model']));
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<td><?php echo __d('cart', 'Total'); ?>
					<td colspan="3"><?php echo CakeNumber::currency($cart['Cart']['total']); ?></td>
				</tr>
			</tfoot>
		</table>
	<?php echo $this->Form->submit(__d('cart', 'Update cart')); ?>
	<?php echo $this->Form->end();?>
	<?php echo $this->element('Cart.payment_methods'); ?>

<?php else : ?>

	<p><?php echo __d('cart', 'Your cart is empty.'); ?></p>

<?php endif; ?>