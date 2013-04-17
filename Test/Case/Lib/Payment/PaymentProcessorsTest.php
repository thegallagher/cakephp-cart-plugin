<?php
App::uses('PaymentProcessors', 'Cart.Lib/Payment');
/**
 * 
 */
class PaymentProcessorCollectionTest extends CakeTestCase {

/**
 * startUp
 *
 * @return void
 */
	public function setUp() {
		
	}

/**
 * tearDown
 *
 * @return void
 */
	public function tearDown() {
		
	}

/**
 * testLoad
 *
 * @return void
 */
	public function testLoad() {
		$Dummy = PaymentProcessors::load('Cart.DummyEc');
		$this->assertTrue(is_a($Dummy, 'DummyEcProcessor'));

		$Dummy = PaymentProcessors::load('Cart.DummyEcProcessor');
		$this->assertTrue(is_a($Dummy, 'DummyEcProcessor'));
	}

}