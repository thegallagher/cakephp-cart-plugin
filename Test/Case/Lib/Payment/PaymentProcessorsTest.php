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
	public function startTest() {
		
	}

/**
 * tearDown
 *
 * @return void
 */
	public function endTest() {
		
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