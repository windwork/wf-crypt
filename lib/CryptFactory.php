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
 * 静态创建加密解密组件类实例工厂类
 * 
 * @package     wf.crypt
 * @author      erzh <cmpan@qq.com>
 * @link        http://www.windwork.org/manual/wf.crypt.html
 * @since       0.1.0
 */
final class CryptFactory {
	/**
	 * 
	 * @var array
	 */
	private static $instance = array();
		
	/**
	 * 创建存贮组件实例
	 * @param string $adapter = 'AzDG'
	 * @return \wf\crypt\ICrypt
	 */
	public static function create($adapter = 'AzDG') {
		// 获取带命名空间的类名
		$class = "\\wf\\crypt\\adapter\\{$adapter}";
		
		// 如果该类实例未初始化则创建
		if(empty(static::$instance[$adapter])) {
			static::$instance[$adapter] = new $class();
		}
		
		return static::$instance[$adapter];
	}
}


