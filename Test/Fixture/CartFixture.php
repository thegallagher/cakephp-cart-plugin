<?php
/**
 * CartFixture
 *
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 * @license MIT
 */
class CartFixture extends CakeTestFixture {

/**
 * Name
 *
 * @var string $name
 */
	public $name = 'Cart';

/**
 * Table
 *
 * @var array $table
 */
	public $table = 'carts';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'user_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
		'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
		'total' => array('type'=>'float', 'null' => true, 'default' => NULL),
		'active' => array('type'=>'boolean', 'null' => true, 'default' => '0'),
		'item_count' => array('type'=>'integer', 'null' => false, 'default' => 0, 'length' => 6),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		)
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 'cart-1',
			'user_id' => 'user-1',
			'name' => 'Default Cart',
			'total' => '1000.00',
			'active' => 1,
			'item_count' => 1,
			'created' => '2012-01-01 12:12:12',
			'modified' => '2012-01-01 12:12:12'
		),
	);

}
