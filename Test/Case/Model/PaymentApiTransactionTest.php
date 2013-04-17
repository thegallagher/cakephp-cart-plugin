<?php
App::uses('PaymentApiTransaction', 'Cart.Model');
/**
 * PaymentApiTransaction Test
 *
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 *
 * @property Cart Cart
 */
class PaymentApiTransactionTest extends CakeTestCase {
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
		'plugin.Cart.PaymentApiTransaction',
	);

/**
 * startUp
 *
 * @return void
 */
	public function setUp() {
		$this->Model = ClassRegistry::init('Cart.PaymentApiTransaction');
	}

/**
 * tearDown
 *
 * @return void
 */
	public function tearDown() {
		ClassRegistry::flush();
		unset($this->Model);
	}

/**
 * testInstance
 *
 * @return void
 */
	public function testInstance() {
		$this->assertTrue(is_a($this->Model, 'PaymentApiTransaction'));
	}

/**
 * testInitialize
 *
 * @return void
 */
	public function testInitialize() {
		$token = $this->Model->initialize('TestClass', 'Order-Id');
		$this->assertTrue(is_string($token));

		$result = $this->Model->find('first', array(
			'conditions' => array(
				'token' => $token)));
		$this->assertEqual($result['PaymentApiTransaction']['processor'], 'TestClass');
		$this->assertEqual($result['PaymentApiTransaction']['order_id'], 'Order-Id');

		$result = CakeSession::read('Payment');
		$this->assertEqual($result, array(
			'orderId' => 'Order-Id',
			'token' => $token,
			'processor' => 'TestClass'));
	}

}