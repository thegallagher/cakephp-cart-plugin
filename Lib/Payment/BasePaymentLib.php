<?php

/**
 * BasePaymentLib
 *
 * @author Florian Kramer
 * @copyright 2012 Florian Kramer
 * @license MIT
 */
abstract class BasePaymentLib extends Object {

/**
 * Log
 *
 * @param string $message
 * @param string $type
 */
	public function log($message, $type = null) {
		if (empty($type)) {
			$type = Inflector::underscore(__CLASS__);
		}
		parent::log($message, $type);
	}

}