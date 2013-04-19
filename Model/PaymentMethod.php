<?php
App::uses('CartAppModel', 'Cart.Model');
/**
 * Payment Method Model
 *
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 */
class PaymentMethod extends CartAppModel {
/**
 * Returns a list of payment methods a customer can pay with
 *
 * @return array
 */
	public function getPublicAvailable() {
		return $this->find('all', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.active' => 1),
			'order' => $this->alias . '.name DESC'));
	}

/**
 * 
 */
	public function getPaymentMethods() {
		$methods = Configure::read('Cart.PaymentMethod');
		$validMethods = array();
		if (!empty($methods)) {
			foreach($methods as $method) {
				if (isset($method['active']) && $method['active'] == 1) {
					$validMethods[] = array($this->alias => $method);
				}
			}
		}
		return $validMethods;
	}

/**
 * Gets the processor class name for a payment method based on id, alias or 
 * classname. This will return it only if the payment method is active.
 *
 * @param $processorAlias
 * @return mixed string on success or false
 */
	public function getMappedClassName($processorAlias = null) {
		$result = $this->find('first', array(
			'fields' => array(
				'class'),
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.active' => 1,
				'OR' => array(
					$this->alias . '.id' => $processorAlias,
					$this->alias . '.class' => $processorAlias,
					$this->alias . '.alias' => $processorAlias))));
		if (!empty($result)) {
			return $result[$this->alias]['class'];
		}
		return false;
	}

}