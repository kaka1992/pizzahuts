<?php define("APP_PATH",dirname(__FILE__)); //app项目目录
header("Content-Type:text/html; charset=utf-8"); 
require_once('initphp/initphp.php'); //导入配置文件-必须载入
require_once('conf/conf.php'); //导入配置文件-必须载入，如果自己不配置，则默认走框架的配置文件
InitPHP::init(); //框架初始化
