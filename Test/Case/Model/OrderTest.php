<?php
App::uses('Order', 'Cart.Model');
/**
 * OrderTest
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 */
class OrderTest extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.Cart.Cart',
		'plugin.Cart.Item',
		'plugin.Cart.Order',
		'plugin.Cart.OrderItem',
		'plugin.Cart.CartsItem',
	);

/**
 * startUp
 *
 * @return void
 */
	public function startTest() {
		$this->Order = ClassRegistry::init('Cart.Order');
	}

/**
 * tearDown
 *
 * @return void
 */
	public function tearDown() {
		ClassRegistry::flush();
		unset($this->Order);
	}

/**
 * testInstance
 *
 * @return void
 */
	public function testInstance() {
		$this->assertTrue(is_a($this->Order, 'Order'));
	}

/**
 * testCreateOrder
 *
 * @return void
 */
	public function testCreateSimpleOrder() {
		$cartData = array(
			'Cart' => array(
				'cart_id' => 'cart-1',
				'requires_shipping' => false,
				'user_id' => 'user-1',
				'total' => 20.95),
			'CartsItem' => array(
				array(
					'name' => 'CakePHP',
					'foreign_key' => 'item-1',
					'model' => 'Item',
					'quantity' => 1,
					'price' => 10),
				array(
					'name' => 'Developer',
					'foreign_key' => 'item-2',
					'model' => 'Item',
					'quantity' => 2,
					'price' => 10)));

		$result = $this->Order->createOrder($cartData, 'Paypal');
		$this->assertTrue(is_array($result) && !empty($result));
	}

	public function testAfterFind() {
		debug($this->Order->find('first'));
	}

}
