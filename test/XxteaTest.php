<?php
require_once '../ICrypt.php';
require_once '../CryptFactory.php';
require_once '../adapter/Xxtea.php';

use \wf\crypt\adapter\Xxtea;

/**
 * Xxtea test case.
 */
class XxteaTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var Xxtea
	 */
	private $xxtea;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated XxteaTest::setUp()
		
		$this->xxtea = new Xxtea(/* parameters */);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated XxteaTest::tearDown()
		$this->xxtea = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests Xxtea->encrypt()
	 */
	public function testEncrypt() {
		$key = 'ssdsdsfdswe';
		$txt = 'ojdsfojdsfo 交水电费 ds ds!';
		$enc = $this->xxtea->encrypt($txt, $key);
		$dec = $this->xxtea->decrypt($enc, $key);
		
		$this->assertEquals($txt, $dec);
	}
	
	/**
	 * Tests Xxtea->decrypt()
	 */
	public function testDecrypt() {
		$crypt = \wf\crypt\CryptFactory::create('Xxtea');
		
		$key = 'ssdsdsfdswe';
		$txt = 'ojdsfojdsfo 交水电费 ds ds!';
		$enc = $crypt->encrypt($txt, $key);
		$dec = $crypt->decrypt($enc, $key);
		
		$this->assertEquals($txt, $dec);
	}
}

