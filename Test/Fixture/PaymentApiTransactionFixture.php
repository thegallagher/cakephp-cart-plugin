<?php
/**
 * PaymentApiTransactionFixture
 *
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 * @license MIT
 */
class PaymentApiTransactionFixture extends CakeTestFixture {

/**
 * Name
 *
 * @var string $name
 */
	public $name = 'PaymentApiTransaction';

/**
 * Table
 *
 * @var array $table
 */
	public $table = 'payment_api_transactions';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary'),
		'order_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36),
		'token' => array('type' => 'string', 'null' => false, 'default' => null),
		'processor' => array('type' => 'string', 'null' => false, 'default' => null),
		'type' => array('type' => 'string', 'null' => false, 'default' => null),
		'message' => array('type' => 'text', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ORDER_INDEX' => array('column' => 'order_id')),
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
	);

} 
