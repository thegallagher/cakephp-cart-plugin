<?php
/**
 * Interface a payment processor must implement to be used for refunds
 *
 */
interface RefundProcessor {

/**
 * Process to the refund of a given amount for the passed Order
 *
 * @throws InvalidArgumentException When there are incorrect parameters to do the refund
 * @throws RuntimeException When an unexpected error occurs
 * @param array $order Information about the Order (read from the database)
 * @param float $amount Amount of the refund
 * @param string $comment Comment related to the refund
 * @param string $reference Reference of the refund (can be empty)
 * @return mixed 
 * 	The refund transaction reference on success (if available immediatly), 
 * 	true (if the refund will be processed in a notfication), 
 * 	false in case of problem 
 * @access public
 */
	public function refund($order, $amount, $comment, $reference);

}