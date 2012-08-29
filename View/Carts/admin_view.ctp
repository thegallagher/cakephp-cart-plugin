<h2><?php echo __('View Cart'); ?></h2>
<?php debug($cart); ?>

<h3><?php echo __('Items'); ?></h3>
<?php if (!empty($cart['CartsItem'])) : ?>
	<?php foreach ($cart['CartsItem'] as $item) : ?>

	<?php endforeach; ?>
<?php endif; ?>