<h3><?php echo __d('cart', 'Choose your Payment Method'); ?></h3>
<?php if (!empty($paymentMethods)) : ?>
	<ul class="payment-methods">
		<?php foreach ($paymentMethods as $paymentMethod) : ?>
		<?php //debug($paymentMethod); ?>
		<li>
			<h4>
				<?php
					echo $this->Html->link($paymentMethod['PaymentMethod']['name'], array(
						'action' => 'checkout', $paymentMethod['PaymentMethod']['class']));
				?>
			</h4>
			<?php
				if (!empty($paymentMethod['PaymentMethod']['logo'])) {
					$image = $this->Html->image($paymentMethod['PaymentMethod']['logo'], array(
						'alt' => $paymentMethod['PaymentMethod']['name']));
				}
			?>
			<?php echo $paymentMethod['PaymentMethod']['description']; ?>
		</li>
		<?php endforeach;?>
	</ul>
<?php endif; ?>