<?php
require_once '../lib/ICrypt.php';
require_once '../lib/CryptFactory.php';
require_once '../lib/adapter/AzDG.php';

use \wf\crypt\adapter\AzDG;

/**
 * AzDG test case.
 */
class AzDGTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var AzDG
	 */
	private $azDG;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		$this->azDG = new AzDG(/* parameters */);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->azDG = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
	}
	
	/**
	 * Tests AzDG->encrypt()
	 */
	public function testEncrypt() {
		$key = 'ssdsdsfdswe';
		$txt = 'ojdsfojdsfo 交水电费 ds ds!';
		$enc = $this->azDG->encrypt($txt, $key);
		$dec = $this->azDG->decrypt($enc, $key);
		
		$this->assertEquals($txt, $dec);
	}
	
	/**
	 * Tests AzDG->decrypt()
	 */
	public function testDecrypt() {
		$crypt = \wf\crypt\CryptFactory::create('AzDG');
		
		$key = 'ssdsdsfdswe';
		$txt = 'ojdsfojdsfo 交水电费 ds ds!';
		$enc = $crypt->encrypt($txt, $key);
		$dec = $crypt->decrypt($enc, $key);
		
		$this->assertEquals($txt, $dec);
	}
}

