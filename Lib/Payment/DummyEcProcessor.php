<?php
App::uses('BasePaymentProcessor', 'Cart.Lib/Payment');
/**
 * Dummy Express Checkout Processor
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 */
class DummyEcProcessor extends BasePaymentProcessor implements ExpressCheckoutInterface {
/**
 * 
 */
	public function ecInitAndRedirect($cart, $options = array()) {
		$this->redirect(array('plugin' => 'cart', 'admin' => false, 'controller' => 'dummy_controller', 'ec_checkout'));
	}

/**
 * 
 */
	public function ecRetrieveInfo($cart, $options = array()) {
		
	}

/**
 * 
 */
	public function ecProcessPayment($cart, $options = array()) {
		return true;
	}

}