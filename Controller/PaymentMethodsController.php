<?php
App::uses('CartAppController', 'Cart.Controller');
/**
 * Payment Methods Controller
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 */
class PaymentMethodsController extends CartsAppController {
/**
 * Name
 *
 */
	public function index() {
		$this->find('all', $this->PaymentMethod->getPaymentMethods());
	}

/**
 * 
 */
	public function admin_index() {
		$this->set('paymentMethods', $this->Paginator->paginate());
	}

}