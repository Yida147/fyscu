<?php
error_reporting(E_ALL &~E_NOTICE &~E_STRICT &~E_DEPRECATED);
header("Content-type:text/html;charset=utf-8");
//可选的定义，在   URL 路由中需要用到入口文件切分   URI ，不定义时默认用  ‘.php’
define('__ENTRANCE__', basename(__FILE__));
define('PROJECT_ROOT', dirname(__FILE__).'/');
define('PROJECT_NAME', 'fyscu');
//引入全局配置文件
require PROJECT_ROOT . './config/global.conf.php';


//引入框架核心
require './fyscu.init.php';
?>