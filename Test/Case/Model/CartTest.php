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
		'plugin.Cart.CartsItem',
		'plugin.Cart.Item',
		'plugin.Cart.Order',
		'plugin.Cart.User',
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
 * testView
 *
 * @return void
 */
	public function testView() {
		$result = $this->Cart->view('cart-1');
		$this->assertTrue(is_array($result));
		$this->assertEqual($result['Cart']['id'], 'cart-1');
	}

/**
 * testView
 *
 * @expectedException NotFoundException
 * @return void
 */
	public function testViewNotFoundException() {
		$this->Cart->view('invalid-cart-id');
	}

/**
 * testAddItem
 *
 * @return void
 */
	public function testAddItem() {
		$this->Cart->cartId = 1;
		$result = $this->Cart->addItem('cart-1',
			array(
				'model' => 'CartsItem',
				'foreign_key' => '1',
				'quantity' => 1,
				'price' => 52.00,
			)
		);
		$this->assertTrue(is_array($result));
		$this->assertEqual($result['CartsItem']['model'], 'CartsItem');
		$this->assertEqual($result['CartsItem']['foreign_key'], 1);
		$this->assertEqual($result['CartsItem']['quantity'], 1);
		$this->assertEqual($result['CartsItem']['price'], 52.00);
	}

/**
 * testIsActive
 *
 * @return void
 */
	public function testIsActive() {
		$result = $this->Cart->isActive('cart-1');
		$this->assertTrue($result);
		$result = $this->Cart->isActive('cart-2');
		$this->assertFalse($result);
	}

/**
 * testSetActive
 *
 * @return void
 */
	public function testSetActive() {
		$result = $this->Cart->setActive('cart-1', 'user-1');
		$this->assertFalse($result);
		$result = $this->Cart->setActive('cart-2', 'user-1');
		$this->assertTrue($result);
	}

/**
 * testSetActiveNotFoundException
 *
 * @expectedException NotFoundException
 * @return void
 */
	public function testSetActiveNotFoundException() {
		$this->Cart->setActive('invalid-cart', 'user-1');
	}

/**
 * testGetActive
 *
 * @return void
 */
	public function testGetActive() {
		$expected = array(
			'Cart' => array(
				'id' => 'cart-1',
				'user_id' => 'user-1',
				'name' => 'Default Cart',
				'total' => '720.37',
				'active' => true,
				'item_count' => '1',
				'created' => '2012-01-01 12:12:12',
				'modified' => '2012-01-01 12:12:12'
			),
			'CartsItem' => array(
				0 => array(
					'id' => 'carts-item-1',
					'cart_id' => 'cart-1',
					'foreign_key' => 'item-1',
					'model' => 'Item',
					'quantity' => '1',
					'name' => 'Eizo Flexscan S2431W',
					'price' => '720.37',
					'created' => '2012-01-01 12:30:00',
					'modified' => '2012-01-01 12:30:00'
				)
			)
		);
		$result = $this->Cart->getActive('user-1');
		$this->assertEqual($result, $expected);

		$result = $this->Cart->getActive('user-does-not-exist', false);
		$this->assertFalse($result);
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
				array('price' => 21.10, 'quantity' => 1)
			)
		);
		$result = $this->Cart->calculateTotals($cart);
		$this->assertEqual($result['Cart']['total'], 45.12);
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
					'price' => 12
				)
			)
		);

		$result = $this->Cart->mergeItems('cart-1', $sessionData['CartsItem']);

		$itemsAfter = $this->Cart->CartsItem->find('all', array(
			'contain' => array(),
			'conditions' => array(
				'cart_id' => 'cart-1'
			)
		));

		$this->assertEqual(count($itemsAfter), $itemCount + 1);
		$this->assertEqual($itemsAfter[0]['CartsItem']['name'], 'Eizo Flexscan S2431W');
		$this->assertEqual($itemsAfter[0]['CartsItem']['quantity'], 2);
	}

/**
 * testAdd
 *
 * @return void
 */
	public function testAdd() {
		$data = array(
			'Cart' => array(
				'name' => 'test'
			)
		);
		$result = $this->Cart->add($data, 'user-1');
		$this->assertTrue($result);
	}

}