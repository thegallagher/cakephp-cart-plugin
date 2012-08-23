<h2><?php echo __d('cart', 'Carts'); ?></h2>
<?php if (!empty($carts)) : ?>
	<table>
		<tr>
			<th></th>
		</tr>
		<?php foreach ($carts as $cart) ?>
			<tr>
				<td>
					
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php else : ?>
	<p><?php echo __d('cart', 'No carts found.'); ?></p>
<?php endif; ?>