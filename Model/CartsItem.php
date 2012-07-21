<?php
App::uses('CartAppModel', 'Cart.Model');
/**
 * Carts Item Model
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 */
class CartsItem extends CartAppModel {
/**
 * Validation domain for translations
 *
 * @var string
 */
	public $validationDomain = 'users';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cart' => array(
			'className' => 'Cart.Cart'));

/**
 * Validation parameters
 *
 * @var array
 */
	public $validate = array(
		'foreign_key' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'required' => true,
				'allowEmpty' => false)),
		'foreign_key' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'required' => true,
				'allowEmpty' => false)),
		'price' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'required' => true,
				'allowEmpty' => false)),
		'quantity' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'required' => true,
				'allowEmpty' => false))
	);

/**
 * validateItem
 *
 * @return void
 */
	public function validateItem($data) {
		$this->set($data);
		return $this->validates();
	}

	public function afterSave($created) {
		
	}

/**
 * Adds and updates an item if it already exists in the cart
 *
 * @param string $cartId
 * @param array $itemData
 */
	public function addItem($cartId, $itemData) {
		$item = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				'cart_id' => $cartId,
				'model' => $itemData['model'],
				'foreign_key' => $itemData['foreign_key'])));

		if (empty($item)) {
			$item = array($this->alias => $itemData);
			$item[$this->alias]['cart_id'] = $cartId;
			$this->create();
		} else {
			$item[$this->alias] = Set::merge($item['CartsItem'], $itemData);
		}
	
		return $this->save($item);
	}

/**
 * Called from the CartManagerComponent when an item is removed from the cart
 *
 * @param string $cartId Cart UUID
 * @parma $itemData
 */
	public function removeItem($cartId, $itemData) {
		$item = $this->find('first', array(
			'contain' => array(),
			'conditions' => array(
				'cart_id' => $cartId,
				'model' => $itemData['model'],
				'foreign_key' => $itemData['foreign_key'])));

		if (empty($item)) {
			return false;
		}

		return $this->delete($item['CartsItem']['id']);
	}

/**
 * Add
 *
 * @return void
 */
	public function add($data) {
		$result = $this->find('first', array(
			'conditions' => array(
				'cart_id' => $data[$this->alias]['cart_id'],
				'foreign_key' => $data[$this->alias]['foreign_key'])));

		if (empty($result)) {
			
		}

		$data = array($this->alias => array($data[$this->alias]));
		foreach ($data as $item) {
			$this->create();
			$this->save($item);
		}
	}

}