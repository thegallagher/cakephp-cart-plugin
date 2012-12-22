<?php
App::uses('CakeLogInterface', 'Log');
/**
 * Payment Api Logger
 *
 * @author Florian Krämer
 * @copyright 2012 Florian Krämer
 * @license MIT
 * @link http://book.cakephp.org/2.0/en/core-libraries/logging.html#creating-and-configuring-log-streams
 * @property Model $Model
 */
class PaymentApiLogger implements CakeLogInterface {

/**
 * Model instance
 *
 * @var Model
 */
	public $Model = null;

/**
 * Log types to log to the payment api log
 *
 * @var array
 */
	public $types = array(
		'payment',
		'payment-debug',
		'payment-error',
		'payment-warning');

/**
 * Constructor
 *
 * @param array $options
 * @throws InternalErrorException
 */
	public function __construct($options = array()) {
		if (!isset($options['model'])) {
			$options['model'] = 'Payments.PaymentApiLog';
		}

		if (!isset($options['types'])) {
			$this->types = array_merge($this->types, $options['types']);
		}

		$this->Model = ClassRegistry::init($options['model']);
		if (method_exists($this->Model, 'write')) {
			throw new InternalErrorException(__('The model %s does not implement a required method write($type, $message, $data)!'));
		}

	}

/**
 * Write to the log
 *
 * @param $type
 * @param $message
 * @return void
 */
	public function write($type, $message) {
		if (!in_array($type, $this->types) || $type == 'payment-debug' && Configure::read('debug') > 0) {
			return;
		}

		$data = array();
		$trace = debug_backtrace();
		if (isset($trace[2]) && isset($trace[2]['file']) && isset($trace[2]['line'])) {
			$data['file'] = $trace[2]['file'];
			$data['line'] = $trace[2]['line'];
			$data['trace'] = serialize($trace);
		}

		$this->Model->writeLog($type, $message, $data);
	}

}