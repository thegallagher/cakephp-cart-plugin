<?php
App::uses('DefaultCartListener', 'Cart.Event');

CakeEventManager::instance()->attach(new DefaultCartListener());

Configure::write('Cart', array(
	'checkoutAction' => array(
		'plugin' => 'cart', 'controller' => 'checkout', 'action' => 'checkout',
	),
	'paymentAction' => array(
		'plugin' => 'cart', 'controller' => 'checkout', 'action' => 'payment',
	),
	'Payments' => array(
		'cancelUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'cancel'),
		'returnUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'finish'),
		'callbackUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'callback'),
		'finishUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'finish'
		)
	)
));