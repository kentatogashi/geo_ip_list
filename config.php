<?php

if(!function_exists('geoip_country_name_by_name')) {
    //throw new Exception("You need GeoIp module.");
    $mes = <<< EOM
<h1>Module Import Error:You need GeoIp module.Please execute below.</h1>
<p>1. yum install re2c geoip geoip-devel.</p>
<p>2. pecl install geoip</p>
<p>3. generate '/etc/php.d/geoip.ini'</p>
<p>4. add 'extension=geoip.so' to geoip.ini</p> 
<p>5. confirm if you can use some function in geoip nodule.</p>
<br>
[example]<br>
geoip_country_name_by_name('74.125.235.129');<br>
=> United States

EOM;
exit($mes);
}

error_reporting(E_ALL & ~E_NOTICE);

//Set include path
$ROOT_PATH = dirname(__FILE__);
$LIB_PATH = $ROOT_PATH."/lib";
set_include_path(get_include_path().PATH_SEPARATOR.$LIB_PATH);


