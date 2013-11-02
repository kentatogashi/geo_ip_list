<?php 
class Crypt {

    public static function encrypt($val) {
	return base64_encode($val);
    }

    public static function decrypt($val) {
	return base64_decode($val);
    }
}
