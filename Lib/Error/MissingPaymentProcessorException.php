<?php
/**
 * MissingPaymentProcessorException
 *
 * @author Florian Kr�mer
 * @copyright 2012 Florian Krämer
 * @license MIT
 */
class MissingPaymentProcessorException extends CakeException {

	protected $_messageTemplate = 'Payment Processor class %s could not be found.';

}