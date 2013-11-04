<?php
class ClassLoader {

    public function __construct() {
	spl_autoload_register(array($this,'loadClass'));
    }

    public static function loadClass($class) {
	$file_name = $class . ".php";
	if(file_exists($file_name)) { 
	    include $file_name;
	}
    }
}

new ClassLoader();
