<?php
/**
 * Windwork
 * 
 * 一个开源的PHP轻量级高效Web开发框架
 * 
 * @copyright Copyright (c) 2008-2017 Windwork Team. (http://www.windwork.org)
 * @license   http://opensource.org/licenses/MIT
 */
namespace wf\crypt\strategy;

/**
 * 可逆对称加密解密
 * 极高效的对称加密算法
 * 参考Discuz! Passport采用的Azerbaijan Development Group（AzDG）开发的可逆加密算法
 *   
 * @package     wf.crypt.strategy
 * @author      cm <cmpan@qq.com>
 * @link        http://docs.windwork.org/manual/wf.crypt.html
 * @since       0.1.0
 */
class AzDG implements \wf\crypt\CryptInterface 
{
	/**
	 * 加密
	 *
	 * @param string 等待加密的原字串
	 * @param string 私有密匙(用于解密和加密)
	 *
	 * @return string 原字串经过私有密匙加密后的结果
	 */
	public function encrypt($txt, $key) 
	{
		// 使用随机数发生器产生 0~32000 的值并 MD5()
		srand((double)microtime() * 1000000);
		$encryptKey = md5(rand(0, 32000));

		// 变量初始化
		$ctr = 0;
		$tmp = '';

		// for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
		for($i = 0; $i < strlen($txt); $i++) {
			// 如果 $ctr = $encryptKey 的长度，则 $ctr 清零
			$ctr = $ctr == strlen($encryptKey) ? 0 : $ctr;
			// $tmp 字串在末尾增加两位，其第一位内容为 $encryptKey 的第 $ctr 位，
			// 第二位内容为 $txt 的第 $i 位与 $encryptKey 的 $ctr 位取异或。然后 $ctr = $ctr + 1
			$tmp .= $encryptKey[$ctr].($txt[$i] ^ $encryptKey[$ctr++]);
		}

		// 返回结果，结果为 self::key() 函数返回值的 base64 编码结果
		return base64_encode(self::key($tmp, $key));
	}

	/**
	 * 解密
	 *
	 * @param string 加密后的字串
	 * @param string 私有密匙(用于解密和加密)
	 *
	 * @return string 字串经过私有密匙解密后的结果
	 */
	public function decrypt($txt, $key) 
	{
		// $txt 的结果为加密后的字串经过 base64 解码，然后与私有密匙一起，
		// 经过 self::key() 函数处理后的返回值
		$txt = self::key(base64_decode($txt), $key);

		// 变量初始化
		$tmp = '';

		// for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
		for ($i = 0; $i < strlen($txt); $i++) {
			// $tmp 字串在末尾增加一位，其内容为 $txt 的第 $i 位，
			// 与 $txt 的第 $i + 1 位取异或。然后 $i = $i + 1
			$tmp .= $txt[$i] ^ $txt[++$i];
		}

		// 返回 $tmp 的值作为结果
		return $tmp;
	}

	/**
	 * 密匙处理
	 *
	 * @param string 待加密或待解密的字串
	 * @param string 私有密匙(用于解密和加密)
	 *
	 * @return string 处理后的密匙
	 */
	private static function key($txt, $encryptKey) 
	{
		// 将 $encryptKey 赋为 $encryptKey 经 md5() 后的值
		$encryptKey = md5($encryptKey);

		// 变量初始化
		$ctr = 0;
		$tmp = '';

		// for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
		for($i = 0; $i < strlen($txt); $i++) {
			// 如果 $ctr = $encryptKey 的长度，则 $ctr 清零
			$ctr = $ctr == strlen($encryptKey) ? 0 : $ctr;
			// $tmp 字串在末尾增加一位，其内容为 $txt 的第 $i 位，
			// 与 $encryptKey 的第 $ctr + 1 位取异或。然后 $ctr = $ctr + 1
			$tmp .= $txt[$i] ^ $encryptKey[$ctr++];
		}

		// 返回 $tmp 的值作为结果
		return $tmp;
	}
}

