<?php
class MCrypt {
    //Class that validate both encryption and decryption about the data of post.
    protected static $_openModules = array();
    public static function encrypt($val,$key,$type,$mode) {
	$module = self::_getModule($type,$mode);
	$iv = self::_alt_mcrypt_create_iv(mcrypt_enc_get_iv_size($module),MCRYPT_RAND);
	mcrypt_generic_init($module,$key,$iv);
	$data = mcrypt_generic($module,$string);
	mcrypt_generic_deinit($module);
	return $data;
    }

    protected static function _getModule($type,$mode) {
	 return self::$_openModules[$type][$mode];
    }

     protected static function _alt_mcrypt_create_iv($size)
	     {
		         $iv = '';
			         for($i = 0; $i < $size; $i++) {
				                 $iv .= chr(rand(0,255));
						         }
			         return $iv;
			     }

}
$string = 'Please encrypt me';
$key = 'this is my encryption key';
$type = 'tripledes';
$mode = 'ecb';

$encrypted = MCrypt::encrypt($string, $key, $type, $mode);
var_dump($encrypted);

