<?php
App::uses('Cart', 'Cart.Model');
/**
 * Cart Test
 *
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 *
 * @property Cart Cart
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
		$result = $this->Cart->addItem(1, array('CartsItem' => array(), 'model' => 'CartsItem', 'foreign_key' => '1'));
		//debug($result);
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

/**
 * testCalculateTotals
 *
 * @return void
 */
	public function testCalculateTotals() {
		$cart = array(
			'CartsItem' => array(
				array('price' => 12.01, 'quantity' => 2),
				array('price' => 21.10, 'quantity' => 1)));
		$result = $this->Cart->calculateTotals($cart);
		$this->assertEqual($result['Cart']['total'], 33.11);
	}

/**
 * testSyncWithSessionData
 *
 * @return void
 */
	public function testSyncWithSessionData() {
		$cart = array(
			'CartsItem' => array(
				array('model' => 12.01, 'foreign_key' => 2),
				array('model' => 21.10, 'foreign_key' => 1)));
		$result = $this->Cart->syncWithSessionData('cart-1', $cart);
	}

}