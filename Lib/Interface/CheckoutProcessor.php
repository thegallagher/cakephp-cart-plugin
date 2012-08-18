<?php
App::uses('NotificationProcessor', 'Cart.Lib/Interface');

/**
 * Interface a payment processor must implement to be used as provider for Cart classic checkouts
 *
 */
interface CheckoutProcessor extends NotificationProcessor {

/**
 * Checkout initialization and redirection
 * Initializes the command on Payment provider side, and redirects to its website for proceeding to the final payment.
 * If an error occurred an exception must be thrown.
 * 
 * The checkout flow must redirect to the following urls:
 *  - at the end of the checkout: the url passed in $options['redirectUrl']
 *  - on error / cancellation: the url passed in $options['cancelUrl']
 *  - automatic notification: automatic notification must be sent to the url passed in $options['notificationUrl'] 
 * 
 * @throws LogicException When the cart content is invalid
 * @throws InvalidArgumentException When there are missing parameters to do the checkout
 * @throws RuntimeException When an unexpected error occurs
 * @param string $cart Cart to checkout with exhaustive information (cf Cart::getExhaustiveCartInfo() return value)
 * @param array $options Options for the checkout. Passed values could be:
 * 	- cancelUrl: Url to redirect to when the user cancels the checkout
 * 	- redirectUrl: Url to redirect after the checkout process
 *  - notificationUrl: Url dispatching automatic notifications to payment providers
 * @return void
 * @access public
 */
	public function cInitAndRedirect($cart, $options);

}