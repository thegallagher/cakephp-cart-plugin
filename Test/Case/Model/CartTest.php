<?php
App::uses('Cart', 'Cart.Model');
/**
 * Cart Test
 * 
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 */
class CartTest extends CakeTestCase {
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
	public function startTest() {
		$this->Cart = ClassRegistry::init('Cart.Cart');
	}

/**
 * tearDown
 *
 * @return void
 */
	public function endTest() {
		ClassRegistry::flush();
		unset($this->Model);
	}

/**
 * testInstance
 *
 * @return void
 */
	public function testInstance() {
		$this->assertTrue(is_a($this->Cart, 'Cart'));
	}

/**
 * testAddItem
 *
 * @return void
 */
	public function testAddItem() {
		$this->Cart->cartId = 1;
		$result = $this->Cart->addItem(1, array('CartsItem' => array()));
		debug($result);
	}

/**
 * testRequiresShipping
 *
 * @return void
 */
	public function testRequiresShipping() {
		$items = array(
			array('foobar' => 'test'));
		$this->assertTrue($this->Cart->requiresShipping($items));

		$items = array(
			array('virtual' => 0));
		$this->assertTrue($this->Cart->requiresShipping($items));

		$items = array(
			array('virtual' => 1));
		$this->assertFalse($this->Cart->requiresShipping($items));
	}

}