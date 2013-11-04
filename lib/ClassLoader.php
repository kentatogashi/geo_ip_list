<?php
class ClassLoader {

    private $base;

    public function __construct() {
	spl_autoload_register(array($this,'loadClass'));
    }

    public function loadClass($class) {
	$file_name = $this->base . $class . ".php";
	if(file_exists($file_name)) { 
	    include $file_name;
	    return true;
	}
	die("load error");	
    }

    public function setBaseDir($base) {
	$this->base = $base;
    }

}

$loader = new ClassLoader();
$loader->setBaseDir("lib/");
