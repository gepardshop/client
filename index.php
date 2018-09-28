<?php
/**
 * +---------------------------------------------------------------
 * | Author: 北京永青宇创科技有限公司
 * | Date: 2018/09/14
 * | 版本: 5.0
 * +---------------------------------------------------------------
 * | CopyRight: 北京永青宇创科技有限公司 All rights reserved.
 * +---------------------------------------------------------------
 * | 版权声明：云豹不是一个自由软件，是云豹官方推出的商业源码。
 * | 严禁在未经许可的情况下拷贝、复制、传播、使用云豹的任意代码
 * | 如有违反，请立即删除，否则您将面临承担相应，法律责任的风险。
 * | 如果需要取得官方授权，请联系官方 https://www.gepardshop.com
 * +---------------------------------------------------------------
 */

// [ 应用入口文件 ]
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');

define('MODULE_MARK', 'Admin');
define('RUNTIME_PATH', __DIR__ . '/public/runtime/');
define('LOG_PATH', __DIR__ . '/public/runtime/');
define('HTML_PATH', RUNTIME_PATH . 'Html/');
define('STATIC_PATH',__DIR__.'public/');

if(is_file(APP_PATH .'/install.lock')===false){
    define('BIND_MODULE', 'install');
}
// 加载框架引导文件
require APP_PATH . './framework/start.php';
