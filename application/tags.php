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

return [
    // 应用初始化
    'app_init' => [
        'app\\framework\\behavior\\InitModule',
        'app\\security\\behavior\\SecurityRun',
//        'app\\ucenter\\behavior\\UserRun',
//        'app\\index\\behavior\\ReadHtmlCacheBehavior', //注意行为的命名空间(下同)
    ],
    // 应用开始
    'app_begin' => [
        'app\\framework\\behavior\\InitConfig', //初始化系统配置行为扩展
    ],
    // 模块初始化
    'module_init' => [],
    // 操作开始执行
    'action_begin' => [],
    // 视图内容过滤
    'view_filter' => [
//        'app\\index\\behavior\\WriteHtmlCacheBehavior',
    ],
    // 日志写入
    'log_write' => [],
    // 应用结束
    'app_end' => [],
];