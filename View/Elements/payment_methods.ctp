<h3><?php echo __d('cart', 'Payment method'); ?></h3>
<?php if (!empty($paymentMethods)) : ?>
	<ul class="payment-methods">
		<?php foreach ($paymentMethods as $paymentMethod) : ?>
		<?php //debug($paymentMethod); ?>
		<li>
			<?php
				if (empty($paymentMethod['PaymentMethod']['logo'])) {
					//echo $this->Html->link($paymentMethod['PaymentMethod']['name'], $paymentMethod['PaymentMethod']['checkoutUrl']);
					echo $this->Html->link($paymentMethod['PaymentMethod']['name'], array('action' => 'checkout', $paymentMethod['PaymentMethod']['class']));
				} else {
					$image = $this->Html->image($paymentMethod['PaymentMethod']['logo'], array('alt' => $paymentMethod['PaymentMethod']['name']));
					//echo $this->Html->link($image, $paymentMethod['PaymentMethod']['checkoutUrl'], array('escape' => false));
				}
			?>
		</li>
		<?php endforeach;?>
	</ul>
<?php endif; ?>