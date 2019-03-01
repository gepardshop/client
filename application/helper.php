<?php

/**
 * +---------------------------------------------------------------
 * | Author: 北京永青宇创科技有限公司
 * | Date: 2019/02/05
 * | 版本: 6.0
 * +---------------------------------------------------------------
 * | CopyRight: 北京永青宇创科技有限公司 All rights reserved.
 * +---------------------------------------------------------------
 * | 版权声明：云豹不是一个自由软件，是云豹官方推出的商业源码。
 * | 严禁在未经许可的情况下拷贝、复制、传播、使用云豹的任意代码
 * | 如有违反，请立即删除，否则您将面临承担相应，法律责任的风险。
 * | 如果需要取得官方授权，请联系官方 https://www.gepardshop.com
 * +---------------------------------------------------------------
 */

use think\Db;
use think\Log;
use think\Url;
use think\Lang;
use think\View;
use think\Cache;
use think\Debug;
use think\Config;
use think\Cookie;
use think\Loader;
use think\Request;
use think\Session;
use think\Response;
use think\exception\HttpException;
use think\exception\HttpResponseException;

/**
 * 系统非常规MD5加密方法
 *
 * @param  string $str 要加密的字符串
 *
 * @return string
 */
if( ! function_exists('think_ucenter_md5')) {
	function think_ucenter_md5($str, $key = 'ThinkUCenter')
	{
		return '' === $str ? '' : md5(sha1($str) . $key);
	}
}
/**
 * 系统加密方法
 *
 * @param string $data   要加密的字符串
 * @param string $key    加密密钥
 * @param int    $expire 过期时间 (单位:秒)
 *
 * @return string
 */
if( ! function_exists('think_ucenter_encrypt')) {
	function think_ucenter_encrypt($data, $key, $expire = 0)
	{
		$key  = md5($key);
		$data = base64_encode($data);
		$x    = 0;
		$len  = strlen($data);
		$l    = strlen($key);
		$char = '';
		for($i = 0; $i < $len; $i++) {
			if($x == $l)
				$x = 0;
			$char .= substr($key, $x, 1);
			$x++;
		}
		$str = sprintf('%010d', $expire ? $expire + time() : 0);
		for($i = 0; $i < $len; $i++) {
			$str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1))) % 256);
		}

		return str_replace('=', '', base64_encode($str));
	}
}
/**
 * 系统解密方法
 *
 * @param string $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param string $key  加密密钥
 *
 * @return string
 */
if( ! function_exists('think_ucenter_decrypt')) {
	function think_ucenter_decrypt($data, $key)
	{
		$key    = md5($key);
		$x      = 0;
		$data   = base64_decode($data);
		$expire = substr($data, 0, 10);
		$data   = substr($data, 10);
		if($expire > 0 && $expire < time()) {
			return '';
		}
		$len  = strlen($data);
		$l    = strlen($key);
		$char = $str = '';
		for($i = 0; $i < $len; $i++) {
			if($x == $l)
				$x = 0;
			$char .= substr($key, $x, 1);
			$x++;
		}
		for($i = 0; $i < $len; $i++) {
			if(ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
				$str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
			} else {
				$str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
			}
		}

		return base64_decode($str);
	}
}

/**
 * 接口异常返回助手函数
 * 如果数据处理异常，将返回404状态码
 */
if( ! function_exists('emptyReturn')) {
	function emptyReturn($ErrorCode = 100000, $message = '操作完成')
	{
		return ['code' => $ErrorCode, 'data' => [], 'message' => $message];
	}
}
/**
 * @tasking 需要继续改造,目前临时改造供接口验证使用
 * 接口异常返回助手函数
 * 如果数据处理异常，将返回404状态码
 */
if( ! function_exists('tokenError')) {
	function tokenError($ErrorCode = 503, $message = '授权错误')
	{
		die(json_encode(['code' => 404, 'data' => $ErrorCode, 'message' => $message]));
	}
}
/**
 * 接口异常返回助手函数
 * 如果数据处理异常，将返回404状态码
 */
if( ! function_exists('canbeEmpty')) {
	function canbeEmpty($val = '')
	{
		$result = isset($val) && empty($val) ? $val : '';

		return $result;
	}
}

/**
 * 不区分大小写的in_array实现
 */
if( ! function_exists('in_array_case')) {
	function in_array_case($value, $array)
	{
		return in_array(strtolower($value), array_map('strtolower', $array));
	}
}

if( ! function_exists('isTimeColumn')) {

	function isTimeColumn($column)
	{

		$type      = '';
		$data_type = $column['DATA_TYPE'];
		switch($data_type) {
			case 'int':
				$type = 'int';
				$end  = substr($column['COLUMN_NAME'], -3);
				if('_at' == $end)
					$type = 'time';
				break;
			case 'mediumint':
				$type = 'mediumint';
				break;
			case 'enum':
				$type = 'enum';
				break;
			case 'tinyint':
				$type = 'tinyint';
				break;
			case 'varchar':
				$type = 'varchar';
				break;
			default:
				$type = 'other';
				break;
		}

		return $type;
	}
}

if( ! function_exists('apiInputReplace')) {

	function apiInputReplace($replace, $subject)
	{

		$search = '__INPUT__';

		$result = str_replace($search, $replace, $subject);

		return $result;
	}
}

