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

if (is_file($_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    require __DIR__ . "/index.php";
}
