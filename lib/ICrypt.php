<?php
/**
 * Windwork
 * 
 * 一个开源的PHP轻量级高效Web开发框架
 * 
 * @copyright   Copyright (c) 2008-2016 Windwork Team. (http://www.windwork.org)
 * @license     http://opensource.org/licenses/MIT	MIT License
 */
namespace wf\crypt;

/**
 * 可逆加密接口
 * 
 * @package     wf.crypt
 * @author      erzh <cmpan@qq.com>
 * @link        http://www.windwork.org/manual/wf.crypt.html
 * @since       0.1.0
 */
interface ICrypt {
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