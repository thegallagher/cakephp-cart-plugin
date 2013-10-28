<?php
/**
 * CartRuleFixture
 *
 */
class CartRuleFixture extends CakeTestFixture {

/**
 * Name
 *
 * @var string $name
 */
	public $name = 'CartRule';

/**
 * Table
 *
 * @var array $table
 */
	public $table = 'cart_rules';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
			'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary'),
			'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255),
			'description' => array('type' => 'string', 'null' => true, 'default' => null),
			'type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'comment' => 'tax, discount'),
			'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
			'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
			'indexes' => array(
				'PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		
	);

}
