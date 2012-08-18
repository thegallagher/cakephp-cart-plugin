<?php
/**
 * Interface a payment processor must implement to be called when notifications
 * are received from the payment provider
 *
 */
interface NotificationProcessor {

/**
 * Validate and parse an automatic notification from the payment provider and returns the actions to perform by the system.
 * In case of errors, the Processor can die and send a failing response to the payment platform or just return false.
 *
 * @return array Actions to be done by the system to update the order informations (can be an empty array), false in case of error.
 * The array can contains several actions and must have the following format: 'action' => array('specific-information')
 * Possible actions and values are:
 * 	- create_order
 * 		* cart_id: id of the Cart to mark as ordered
 * 		* payment_status: status of the payment made (cf CartOrder->paymentTypes for a list of possible values)
 * 		* payment_reference: internal reference for the transaction
 * 		* shipping_address, optional
 *		* taxes: either the total tax amount for the order, or detailed array
 *			of taxes per item array(item_id => tax_amount), optional
 * 	- update_status
 * 		* order_reference: payment reference of the order
 * 		* new_status: new status for this order
 * 	- refund
 * 		* order_reference: payment reference of the refunded order
 * 		* amount: refund amount
 * @access public
 */
	public function parseNotification();

/**
 * Callback triggered when a notification was successfully processed by the system
 *
 * @param string $message Details about what was executed
 * @return void
 * @access public
 */
	public function notificationSuccess($message);

/**
 * Callback triggered when an error occurred when processing the notification
 *
 * @param string $message Details about the error
 * @return void
 * @access public
 */
	public function notificationError($message);

}