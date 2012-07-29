<?php
/* ShippingMethod Test cases generated on: 2012-07-29 23:07:30 : 1343598870*/
App::import('Model', 'Cart.ShippingMethod');

App::import('Lib', 'Templates.AppTestCase');
class ShippingMethodTestCase extends AppTestCase {
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
		$this->ShippingMethod = ClassRegistry::init('ShippingMethod');
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
		unset($this->ShippingMethod);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShippingMethod, $this->record);

		// Test mandatory fields
		$data = array('ShippingMethod' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShippingMethod, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShippingMethod]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShippingMethod, $data, $expectedErrors);
	}

/**
 * Test adding a Shipping Method 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShippingMethod']['id']);
		$result = $this->ShippingMethod->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShippingMethod']['id']);
			//unset($data['ShippingMethod']['title']);
			$result = $this->ShippingMethod->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shipping Method 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShippingMethod->edit('shippingmethod-1', null);

		$expected = $this->ShippingMethod->read(null, 'shippingmethod-1');
		$this->assertEqual($result['ShippingMethod'], $expected['ShippingMethod']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShippingMethod']['title'] = null;

		$result = $this->ShippingMethod->edit('shippingmethod-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShippingMethod->edit('shippingmethod-1', $data);
		$this->assertTrue($result);

		$result = $this->ShippingMethod->read(null, 'shippingmethod-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShippingMethod']['title'], $data['ShippingMethod']['title']);

		try {
			$this->ShippingMethod->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shipping Method 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShippingMethod->view('shippingmethod-1');
		$this->assertTrue(isset($result['ShippingMethod']));
		$this->assertEqual($result['ShippingMethod']['id'], 'shippingmethod-1');

		try {
			$result = $this->ShippingMethod->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shipping Method 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShippingMethod->validateAndDelete('invalidShippingMethodId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shipping Method');
		}
		try {
			$postData = array(
				'ShippingMethod' => array(
					'confirm' => 0));
			$result = $this->ShippingMethod->validateAndDelete('shippingmethod-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shipping Method');
		}

		$postData = array(
			'ShippingMethod' => array(
				'confirm' => 1));
		$result = $this->ShippingMethod->validateAndDelete('shippingmethod-1', $postData);
		$this->assertTrue($result);
	}
	
}
