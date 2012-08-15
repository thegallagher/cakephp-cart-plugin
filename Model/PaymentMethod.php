<?php
App::uses('CartAppModel', 'Cart.Model');
/**
 * Payment Method Model
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 */
class PaymentMethod extends CartAppModel {

/**
 * 
 */
	public $useTable = false;

/**
 * 
 */
	public function getActiveMethods() {
		return $this->find('all', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.active' => 1),
			'order' => $this->alias . '.position ASC'));
	}

/**
 * 
 */
	public function getPaymentMethods() {
		return Configure::read('Cart.PaymentMethod');
	}

/**
 * 
 * @return string
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