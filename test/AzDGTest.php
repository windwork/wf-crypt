<?php
require_once '../lib/CryptInterface.php';
require_once '../lib/strategy/AzDG.php';

use \wf\crypt\strategy\AzDG;

/**
 * AzDG test case.
 */
class AzDGTest extends PHPUnit_Framework_TestCase 
{
	
	/**
	 *
	 * @var AzDG
	 */
	private $azDG;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() 
	{
		parent::setUp ();
		
		$this->azDG = new AzDG(/* parameters */);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() 
	{
		$this->azDG = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() 
	{
	}
	
	/**
	 * Tests AzDG->encrypt()
	 */
	public function testEncrypt() 
	{
		$key = 'ssdsdsfdswe';
		$txt = 'ojdsfojdsfo 交水电费 ds ds!';
		$enc = $this->azDG->encrypt($txt, $key);
		$dec = $this->azDG->decrypt($enc, $key);
		
		$this->assertEquals($txt, $dec);
	}
	
	/**
	 * Tests AzDG->decrypt()
	 */
	public function testDecrypt() 
	{
		$crypt = new \wf\crypt\strategy\AzDG();
		
		$key = 'ssdsdsfdswe';
		$txt = 'ojdsfojdsfo 交水电费 ds ds!';
		$enc = $crypt->encrypt($txt, $key);
		$dec = $crypt->decrypt($enc, $key);
		
		$this->assertEquals($txt, $dec);
	}
}

