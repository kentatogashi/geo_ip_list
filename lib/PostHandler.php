<?php

class PostHandler {
    private $_post = array();
    private $_params = array();
    
    public function __construct($post) {

	$post = trim($post);

	if(!strlen($post) > 0) {
	    throw new Exception('Post data is empty');
	}
	$this->_params = $this->_parse($post);
#	var_dump($this->_params);exit;
    }

    private function _parse($post) {
	$rows = explode("\n",$post);
	$parsed_params = array();

	foreach($rows as $key => $val) {
#	    var_dump($val);
	    if(strstr($val,'@')) {
		
		$tmp = explode(':',$val);
#		var_dump($tmp);
		$parsed_params[$key]['mail_address'] = $tmp[0];
		$parsed_params[$key]['ip_address'] = $tmp[1];
		$parsed_params[$key]['country_name'] = $this->_searchCountryName($tmp[1]);
#	var_dump($parsed_params);
	    } else {
		$parsed_params[$key]['ip_address'] = $val;
		$parsed_params[$key]['country_name'] = $this->_searchCountryName($val);
	    }
	}
	#var_dump($parsed_params);exit;
	return $parsed_params;

    }

    private function _searchCountryName($ip_address) {
	$country_name = geoip_country_name_by_name($ip_address);
	
	if(empty($country_name)) $country_name = null;

	return $country_name;
    }

    public function getParams() {
	return $this->_params;
    }
}
