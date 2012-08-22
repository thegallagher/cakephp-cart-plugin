<?php
App::uses('CartAppController', 'Cart.Controller');
/**
 * Payment Methods Controller
 *
 * This controller is not going to have an admin_add method because a new
 * method should be added only by code, for example an migration.
 * 
 * Existing methods should also not be deleteable, they can just be set to 
 * inactive. The payment processor needs to stay in place because for old 
 * orders you will still need it to do refunds.
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 */
class PaymentMethodsController extends CartsAppController {
/**
 * 
 */
	public function beforeFilter() {
		parent::beforeFilter();
		if (Configure::read('Cart.allowAnonymousCheckout') == true) {
			$this->Auth->allow('*');
		}
	}

/**
 * Displays a list of payment methods
 *
 */
	public function index() {
		$this->find('all', $this->PaymentMethod->getPublicAvailable());
	}

/**
 * @return void
 */
	public function admin_index() {
		$this->set('paymentMethods', $this->Paginator->paginate());
	}

/**
 * 
 */
	public function admin_edit($id = null) {
		
	}

}