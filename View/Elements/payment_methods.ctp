<h3><?php echo __d('cart', 'Payment method'); ?></h3>
<?php if (!empty($paymentMethods)) : ?>
	<ul class="payment-methods">
		<?php foreach ($paymentMethods as $paymentMethod) : ?>
		<li>
			<?php
				if (empty($paymentMethod['logo'])) {
					echo $this->Html->link($paymentMethod['name'], $paymentMethod['checkoutUrl']);
				} else {
					$image = $this->Html->image($paymentMethod['logo'], array('alt' => $paymentMethod['name']));
					echo $this->Html->link($image, $paymentMethod['checkoutUrl'], array('escape' => false));
				}
			?>
		</li>
		<?php endforeach;?>
	</ul>
<?php endif; ?>