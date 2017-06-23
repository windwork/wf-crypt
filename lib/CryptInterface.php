<?php
/**
 * Windwork
 * 
 * 一个用于快速开发高并发Web应用的轻量级PHP框架
 * 
 * @copyright Copyright (c) 2008-2017 Windwork Team. (http://www.windwork.org)
 * @license   http://opensource.org/licenses/MIT
 */
namespace wf\crypt;

/**
 * 可逆加密接口
 * 
 * @package     wf.crypt
 * @author      cm <cmpan@qq.com>
 * @link        http://docs.windwork.org/manual/wf.crypt.html
 * @since       0.1.0
 */
interface CryptInterface
{
	/**
	 * 加密，原字串经过私有密匙加密
	 *
	 * @param string 等待加密的原字串
	 * @param string 私有密匙(用于解密和加密)
	 * @return string 
	 */
	public function encrypt($txt, $key);

	/**
	 * 解密，字串经过私有密匙解密
	 *
	 * @param string 加密后的字串
	 * @param string 私有密匙(用于解密和加密)
	 * @return string 
	 */
	public function decrypt($txt, $key);

}