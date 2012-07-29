<?php
/* ShippingMethods Test cases generated on: 2012-07-29 23:07:57 : 1343598897*/
App::import('Controller', 'Cart.ShippingMethods');

App::import('Lib', 'Templates.AppControllerTestCase');
class ShippingMethodsControllerTestCase extends AppControllerTestCase {
/**
 * Autoload entrypoint for fixtures dependecy solver
 *
 * @var string
 * @access public
 */
	public $plugin = 'app';

/**
 * Test to run for the test case (e.g array('testFind', 'testView'))
 * If this attribute is not empty only the tests from the list will be executed
 *
 * @var array
 * @access protected
 */
	protected $_testsToRun = array();

/**
 * Start Test callback
 *
 * @param string $method
 * @return void
 * @access public
 */
	public function startTest($method) {
		parent::startTest($method);
		$this->ShippingMethods = $this->generate(
			'ShippingMethods', array(
			  'methods' => array(
				'redirect'),
			  'components' => array(
				'Session')));
		$this->ShippingMethods->constructClasses();
		$this->ShippingMethods->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ShippingMethodFixture();
		$this->record = array('ShippingMethod' => $fixture->records[0]);
	}

/**
 * End Test callback
 *
 * @param string $method
 * @return void
 * @access public
 */
	public function endTest($method) {
		parent::endTest($method);
		unset($this->ShippingMethods);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	// public function assertFlash($message) {
		// $flash = $this->ShippingMethods->Session->read('Message.flash');
		// $this->assertEqual($flash['message'], $message);
		// $this->ShippingMethods->Session->delete('Message.flash');
	// }

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertInstanceOf('ShippingMethodsController', $this->ShippingMethods);
	}


/**
 * testIndex
 *
 * @return void
 * @access public
 */
	public function testIndex() {
		$this->ShippingMethods->index();
		$this->assertTrue(!empty($this->ShippingMethods->viewVars['shippingMethods']));
	}

/**
 * testAdd
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$this->ShippingMethods->data = $this->record;
		unset($this->ShippingMethods->request->data['ShippingMethod']['id']);
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'The shipping method has been saved');
		$this->ShippingMethods->add();
		//$this->ShippingMethods->expectExactRedirectCount();
	}

/**
 * testEdit
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$this->ShippingMethods->edit('shippingmethod-1');
		$this->assertEqual($this->ShippingMethods->data['ShippingMethod'], $this->record['ShippingMethod']);

		$this->ShippingMethods->data = $this->record;
		$this->expectRedirect($this->ShippingMethods, array('action' => 'view', 'shippingmethod-1'));
		$this->assertFlash($this->ShippingMethods, 'Shipping Method saved');
		$this->ShippingMethods->edit('shippingmethod-1');
		//$this->ShippingMethods->expectExactRedirectCount();
	}

/**
 * testView
 *
 * @return void
 * @access public
 */
	public function testView() {
		$this->ShippingMethods->view('shippingmethod-1');
		$this->assertTrue(!empty($this->ShippingMethods->viewVars['shippingMethod']));

		$this->_resetExpectation();
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'Invalid Shipping Method');
		$this->ShippingMethods->view('WRONG-ID');
		//$this->ShippingMethods->expectExactRedirectCount();
	}

/**
 * testDelete
 *
 * @return void
 * @access public
 */
	public function testDelete() {
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'Invalid Shipping Method');
		$this->ShippingMethods->delete('WRONG-ID');

		$this->ShippingMethods->delete('shippingmethod-1');
		$this->assertTrue(!empty($this->ShippingMethods->viewVars['shippingMethod']));

		$this->_resetExpectation();
		$this->ShippingMethods->data = array('ShippingMethod' => array('confirmed' => 1));
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'Shipping method deleted');
		$this->ShippingMethods->delete('shippingmethod-1');
		//$this->ShippingMethods->expectExactRedirectCount();
	}


/**
 * testAdminIndex
 *
 * @return void
 * @access public
 */
	public function testAdminIndex() {
		$this->ShippingMethods->admin_index();
		$this->assertTrue(!empty($this->ShippingMethods->viewVars['shippingMethods']));
	}

/**
 * testAdminAdd
 *
 * @return void
 * @access public
 */
	public function testAdminAdd() {
		$this->ShippingMethods->data = $this->record;
		unset($this->ShippingMethods->request->data['ShippingMethod']['id']);
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'The shipping method has been saved');
		$this->ShippingMethods->admin_add();
		//$this->ShippingMethods->expectExactRedirectCount();
	}

/**
 * testAdminEdit
 *
 * @return void
 * @access public
 */
	public function testAdminEdit() {
		$this->ShippingMethods->admin_edit('shippingmethod-1');
		$this->assertEqual($this->ShippingMethods->data['ShippingMethod'], $this->record['ShippingMethod']);

		$this->ShippingMethods->data = $this->record;
		$this->expectRedirect($this->ShippingMethods, array('action' => 'view', 'shippingmethod-1'));
		$this->assertFlash($this->ShippingMethods, 'Shipping Method saved');
		$this->ShippingMethods->admin_edit('shippingmethod-1');
		//$this->ShippingMethods->expectExactRedirectCount();
	}

/**
 * testAdminView
 *
 * @return void
 * @access public
 */
	public function testAdminView() {
		$this->ShippingMethods->admin_view('shippingmethod-1');
		$this->assertTrue(!empty($this->ShippingMethods->viewVars['shippingMethod']));

		$this->_resetExpectation();
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'Invalid Shipping Method');
		$this->ShippingMethods->admin_view('WRONG-ID');
		//$this->ShippingMethods->expectExactRedirectCount();
	}

/**
 * testAdminDelete
 *
 * @return void
 * @access public
 */
	public function testAdminDelete() {
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'Invalid Shipping Method');
		$this->ShippingMethods->admin_delete('WRONG-ID');

		$this->ShippingMethods->admin_delete('shippingmethod-1');
		$this->assertTrue(!empty($this->ShippingMethods->viewVars['shippingMethod']));

		$this->_resetExpectation();
		$this->ShippingMethods->data = array('ShippingMethod' => array('confirmed' => 1));
		$this->expectRedirect($this->ShippingMethods, array('action' => 'index'));
		$this->assertFlash($this->ShippingMethods, 'Shipping method deleted');
		$this->ShippingMethods->admin_delete('shippingmethod-1');
		//$this->ShippingMethods->expectExactRedirectCount();
	}



	
}
