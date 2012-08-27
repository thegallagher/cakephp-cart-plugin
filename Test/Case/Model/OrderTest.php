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
 * testView
 *
 * @return void
 */
	public function testView() {
		$result = $this->Order->view('order-1', 'user-1');
		$this->assertTrue(is_array($result) && !empty($result));
		$this->assertEqual($result['Order']['user_id'], 'user-1');
		$this->assertEqual($result['Order']['id'], 'order-1');
	}

/**
 * testViewNotFoundException
 *
 * @expectedException NotFoundException
 */
	public function testViewNotFoundException() {
		$this->Order->view('invalid-order', 'user-1');
	}

/**
 * testCreateOrder
 *
 * @return void
 */
	public function testCreateSimpleOrder() {
		$cartData = array(
			'Cart' => array(
				'id' => 'cart-1',
				'requires_shipping' => false,
				'user_id' => 'user-1',
				'processor' => 'Paypal.PaypalExpress',
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

/**
 * testCreateOrder
 *
 * @return void
 */
	public function testValidateOrder() {
		$cartData = array(
			'Cart' => array(
				'id' => 'cart-1',
				'requires_shipping' => false,
				'user_id' => 'user-1',
				'processor' => 'Paypal.PaypalExpress',
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

		$cartData['Order'] = array(
			'user_id' => 'user-1',
			'cart_snapshot' => serialize($cartData));

		$cartData['BillingAddress'] = array(
			'same_as_shipping' => 1);

		$cartData['ShippingAddress'] = array(
			'first_name' => 'Cake',
			'last_name' => 'PHP',
			'street' => 'Cookie Street',
			'city' => 'Cake Town',
			'zip' => '12345',
			'country' => 'DEU');

		$result = $this->Order->validateOrder($cartData);
		$this->assertTrue(is_array($result));
	}

}
