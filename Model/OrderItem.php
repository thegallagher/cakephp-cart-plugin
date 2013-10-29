<?php
App::uses('CartAppModel', 'Cart.Model');
/**
 * OrderItem Model
 *
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 * @license MIT
 */
class OrderItem extends CartAppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Cart.Order',
			'counterCache' => true
		)
	);

}