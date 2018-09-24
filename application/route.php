<?php

/**
 * +---------------------------------------------------------------
 * | Author: 北京永青宇创科技有限公司
 * | Date: 2017/09/29
 * | 版本: 国庆版
 * +---------------------------------------------------------------
 * | CopyRight: 北京永青宇创科技有限公司 All rights reserved.
 * +---------------------------------------------------------------
 * | 版权声明：云豹不是一个自由软件，是云豹官方推出的商业源码。
 * | 严禁在未经许可的情况下拷贝、复制、传播、使用云豹的任意代码
 * | 如有违反，请立即删除，否则您将面临承担相应，法律责任的风险。
 * | 如果需要取得官方授权，请联系官方http://www.gepardshop.com
 * +---------------------------------------------------------------
 */

use think\Route;

// 注册路由到index模块的News控制器的read操作

//@tasking 模块不能以x开头命名
//Route::get('-<url>', 'shorturl/Index/Jump', [], ['url' => '[a-zA-Z0-9]+']);
Route::get('site', 'seo/Index/index');
Route::get('sitemap', 'seo/Index/index');

//域名路由
if(is_file(APP_PATH .'/install.lock')===true){
    // blog子域名绑定到blog模块
    $apps = \think\Db::query('select * from '.config('database.prefix').'module');
    if(!empty($apps))
    {
        foreach ($apps as $app) {
            if(!empty($app['sub_domain']))
            {
//                Route::domain($app['sub_domain'],strtolower($app['name']));
            }

        }
    }
}

//Route::domain('admin','admin');
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]' => [
        ':id' => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    '__domain__'=>[
//        'question'      => 'question',
    ],
];
