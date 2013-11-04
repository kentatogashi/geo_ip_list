<?php

error_reporting(E_ALL & ~E_NOTICE);

if(!function_exists('geoip_country_name_by_name')) {
    throw new Exception("You need geoip module.HINT:'yum install re2c geoip geoip-devel and pecl install geoip");
}

if(!defined('DS')) {
    define('DS',DIRECTORY_SEPARATOR);
}

if(!defined('ROOT')) {
    define('ROOT',dirname(__FILE__));
}

if(!defined('LIB_PATH')) {
    define('LIB_PATH',ROOT . DS . 'lib' . DS);
}

if(!defined('WWW_ROOT')) {
    define('WWW_ROOT',ROOT . DS . 'static' . DS);
}

include LIB_PATH . "ClassLoader.php";

$Post = new PostHandler();

if(isset($_POST['ip_list'])) {
    $Post->setParams($_POST['ip_list']);
    $data = $Post->getParams();
}

//call template/html file

include WWW_ROOT . "index.php";
