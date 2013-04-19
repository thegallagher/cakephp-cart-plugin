<?php
App::uses('CartsItem', 'Cart.Model');
/**
 * CartsItem Test
 * 
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 * @license MIT
 */
class CartsItemTest extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.Cart.Cart',
		'plugin.Cart.Item',
		'plugin.Cart.Order',
		'plugin.Cart.CartsItem',
	);

/**
 * startUp
 *
 * @return void
 */
	public function setUp() {
		$this->CartsItem = ClassRegistry::init('Cart.CartsItem');
	}

/**
 * tearDown
 *
 * @return void
 */
	public function tearDown() {
		ClassRegistry::flush();
		unset($this->CartsItem);
	}

/**
 * testInstance
 *
 * @return void
 */
	public function testInstance() {
		$this->assertTrue(is_a($this->CartsItem, 'CartsItem'));
	}

/**
 * testValidateItem
 *
 * @return void
 */
	public function testValidateItem() {
		$data = array(
			'foo' => 'bar');
		$result = $this->CartsItem->validateItem($data);
		debug($this->CartsItem->invalidFields());
	}
}