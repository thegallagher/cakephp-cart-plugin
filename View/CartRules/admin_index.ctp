<h2><?php echo __d('cart', 'Cart Rules for Taxes and Discounts'); ?></h2>
<?php if (!empty($cartRules)) : ?>
	<table>
		<?php foreach ($cartRules as $rule) : ?>
			<tr>
				<td><?php echo $this->Html->link($rule['CartRule']['name'], array('action' => 'edit', $rule['CartRule']['id'])); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php else: ?>
	<p><?php echo __d('cart', 'No rules set up.'); ?></p>
<?php endif; ?>