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

\think\Config::load(APP_PATH . 'extra/default/prod.php');
\think\Config::load(APP_PATH . 'extra/default/token.php');
\think\Config::load(APP_PATH . 'extra/default/setting.php');
\think\Config::load(APP_PATH . 'extra/default/module.php');
\think\Config::load(APP_PATH . 'extra/default/url.php');
\think\Config::load(APP_PATH . 'extra/default/debug.php');

defined('DOMAIN_FULL') or define('DOMAIN_FULL', '');
defined('DOMAIN_SHORT') or define('DOMAIN_SHORT', '');
defined('DOMAIN_CLOUD') or define('DOMAIN_CLOUD', 'https://www.gepardshop.com');
defined('DOMAIN_CDN') or define('DOMAIN_CDN', 'https://alicdn.gepardshop.com');