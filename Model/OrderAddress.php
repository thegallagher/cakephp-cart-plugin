<?php
App::uses('CartAppModel', 'Cart.Model');

/**
 * Order Address Model
 *
 * Thought to be used for shipping and billing addresses
 */
class OrderAddress extends CartAppModel {

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array(
		'Search.Searchable'
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Cart.Order'
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty')),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty')),
		'street' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty')),
		'city' => array(
			'notEmpty' => array(
			'rule' => 'notEmpty')),
		'zip' => array(
			'notEmpty' => array(
			'rule' => 'notEmpty')),
		'country' => array(
			'notEmpty' => array(
			'rule' => 'notEmpty')),
		'type' => array(
			'notEmpty' => array(
			'rule' => 'notEmpty')),
	);

/**
 * Filters args for search
 *
 * @var array
 */
	public $filterArgs = array(
		array('name' => 'first_name', 'type' => 'like', 'field' => 'first_name'),
		array('name' => 'last_name', 'type' => 'like', 'field' => 'last_name'),
		array('name' => 'street', 'type' => 'like', 'field' => 'street'),
		array('name' => 'zip', 'type' => 'like', 'field' => 'zip'),
		array('name' => 'city', 'type' => 'like', 'field' => 'city'),
	);

/**
 * Gets all addresses by user id ordered by primary address first and then first
 * name ascending
 *
 * @param string $userId
 * @return array
 */
	public function byUserId($userId = null) {
		$this->find('all', array(
			'contain' => array(),
			'conditions' => array(
				$this->alias . '.user_id' => $userId ),
			'order' => array(
				'primary' => 'ASC',
				'first_name' => 'ASC')));
	}

}