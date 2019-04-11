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

use think\Route;
use \think\Request;

//站点地图
Route::get('site', 'seo/Index/index');
Route::get('sitemap', 'seo/Index/index');

//API接口
Route::resource('api/:version/user', 'api/:version.User');   //注册一个资源路由，对应restful各个方法,.为目录

Route::rule('api/:version/user/:id/fans', 'api/:version.User/fans'); //restful方法中除restful api外的其他方法路由
Route::rule('api/:version/token/wechat', 'api/:version.Token/wechat');
Route::rule('api/:version/token/mobile', 'api/:version.Token/mobile');
//Route::miss('Error/index');

//框架兼容处理
$pathinfo = strtolower(Request::instance()->pathinfo());
$baseFile = basename(strtolower(Request::instance()->baseFile()));
$pathinfo = $pathinfo == 'admin' ? $pathinfo . '/' : $pathinfo;

if( ! preg_match('/^admin\//', $pathinfo) && $baseFile != 'admin.php' && $baseFile != 'api.php' && ! preg_match('/^api/', $pathinfo) && file_exists("public" . DS . "install.lock")) {
	\think\Route::bind('index');

};

if('/' == $pathinfo && 'admin.php' == $baseFile) {
	\think\Route::bind('Admin');
}

if (defined('BIND_MODULE') && ! preg_match('/^admin\//', $pathinfo) && $baseFile != 'admin.php' && $baseFile != 'api.php' && ! preg_match('/^api/', $pathinfo) && file_exists("public" . DS . "install.lock")) {
	\think\Route::bind(BIND_MODULE);
}

//Route::domain('admin','admin');
return [
	'__pattern__' => [
		'name' => '\w+',
	],
];
