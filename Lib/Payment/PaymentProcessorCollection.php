<?php
App::uses('ObjectCollection', 'Utility');
App::uses('CakeEventListener', 'Event');
/**
 * PaymentProcessorCollection
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 */
class PaymentProcessorCollection extends ObjectCollection implements CakeEventListener {
/**
 * Loads a new payment processor
 *
 * @param string
 * @param array $options
 * @return 
 */
	public function load($processor, $options = array()) {
		list($plugin, $name) = pluginSplit($processor, true);
		$class = $name . 'Processor';

		App::uses($class, $plugin . 'Lib/Payment');
/*
		if (!class_exists($class)) {
			throw new MissingPaymentProcessorException(array(
				'class' => $class,
				'plugin' => substr($plugin, 0, -1)));
		}
*/
		$this->_loaded[$name] = new $class($options);
		$this->enable($name);
		return $this->_loaded[$name];
	}

/**
 * Returns the implemented events that will get routed to the trigger function
 * in order to dispatch them separately on each component
 *
 * @return array
 */
	public function implementedEvents() {
		return array(
			'Carts.checkout' => array('callable' => 'trigger'),
			'Carts.callback' => array('callable' => 'trigger'),
		);
	}
}