<?php
/**
 *
 */
Configure::write('Cart', array(
	'Payments' => array(
		'cancelUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'cancel'),
		'returnUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'finish'),
		'callbackUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'callback'),
		'finishUrl' => array('admin' => false, 'plugin' => 'cart', 'controller' => 'checkout', 'action', 'finish'))));