<?php
App::uses('Cart', 'Cart.Model');
/**
 * Cart Test
 *
 *
 * @author Florian Krämer
 * @copyright 2012 - 2013 Florian Krämer
 * @license MIT
 *
 * @property Cart Cart
 */
class CartTest extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.Cart.Cart',
		'plugin.Cart.Item',
		'plugin.Cart.Order',
		'plugin.Cart.CartsItem',
	);

/**
 * startUp
 *
 * @return void
 */
	public function setUp() {
		$this->Cart = ClassRegistry::init('Cart.Cart');
	}

/**
 * tearDown
 *
 * @return void
 */
	public function tearDown() {
		ClassRegistry::flush();
		unset($this->Model);
	}

/**
 * testInstance
 *
 * @return void
 */
	public function testInstance() {
		$this->assertTrue(is_a($this->Cart, 'Cart'));
	}

/**
 * testAddItem
 *
 * @return void
 */
	public function testAddItem() {
		$this->Cart->cartId = 1;
		$result = $this->Cart->addItem(1, array('CartsItem' => array(), 'model' => 'CartsItem', 'foreign_key' => '1'));
		//debug($result);
	}

/**
 * testRequiresShipping
 *
 * @return void
 */
	public function testRequiresShipping() {
		$items = array(
			array('foobar' => 'test'));
		$this->assertTrue($this->Cart->requiresShipping($items));

		$items = array(
			array('virtual' => 0));
		$this->assertTrue($this->Cart->requiresShipping($items));

		$items = array(
			array('virtual' => 1));
		$this->assertFalse($this->Cart->requiresShipping($items));
	}

/**
 * testCalculateTotals
 *
 * @return void
 */
	public function testCalculateTotals() {
		$cart = array(
			'CartsItem' => array(
				array('price' => 12.01, 'quantity' => 2),
				array('price' => 21.10, 'quantity' => 1)));
		$result = $this->Cart->calculateTotals($cart);
		$this->assertEqual($result['Cart']['total'], 33.11);
	}

/**
 * testSyncWithSessionData
 *
 * @return void
 */
	public function testMergeItems() {
		$itemsBefore = $this->Cart->CartsItem->find('all', array(
			'contain' => array(),
			'conditions' => array(
				'cart_id' => 'cart-1')));

		$itemCount = count($itemsBefore);
		$sessionData = array(
			'Cart' => array(),
			'CartsItem' => array(
				// A new item to merge in
				array(
					'name' => 'CakePHP',
					'model' => 'Item',
					'foreign_key' => 'item-2',
					'quantity' => 1,
					'price' => 999.10
				),
				// Update an existing items quantity by +1
				array(
					'model' => 'Item',
					'foreign_key' => 'item-1',
					'quantity' => 2,
					'price' => 12)));
		$result = $this->Cart->mergeItems('cart-1', $sessionData['CartsItem']);

		$itemsAfter = $this->Cart->CartsItem->find('all', array(
			'contain' => array(),
			'conditions' => array(
				'cart_id' => 'cart-1')));

		$this->assertEqual(count($itemsAfter), $itemCount + 1);
		$this->assertEqual($itemsAfter[0]['CartsItem']['name'], 'Eizo Flexscan S2431W');
		$this->assertEqual($itemsAfter[0]['CartsItem']['quantity'], 2);
	}

}