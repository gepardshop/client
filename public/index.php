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

// [ 应用入口文件 ]
// 定义应用目录
define('MODULE_MARK', 'Admin');

define('APP_PATH', __DIR__ . DIRECTORY_SEPARATOR . '../application' . DIRECTORY_SEPARATOR);
define('RUNTIME_PATH', __DIR__  . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR);
define('LOG_PATH', __DIR__  . DIRECTORY_SEPARATOR . 'runtime' . DIRECTORY_SEPARATOR);
define('HTML_PATH', RUNTIME_PATH  . 'Html' . DIRECTORY_SEPARATOR);
define('STATIC_PATH', __DIR__ . DIRECTORY_SEPARATOR);

// 加载框架引导文件
require __DIR__ . '/../gepardcore/thinkphp/start.php';
