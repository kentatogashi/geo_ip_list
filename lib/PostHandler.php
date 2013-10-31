<?php

class PostHandler {
    private $_post = array();
    private $_params = array();
    
    public function __construct($post) {

	$post = trim($post['ip_list']);
	if(function_exists()) 
	if(!strlen($post['ip_list']) > 0) {
	    throw new Exception('Post data is empty');
	}
	$this->_params = $this->_parse($post);
    }

    private function _parse($post) {
	$rows = explode("\n",$post);
	$parsed_params = array();

	foreach($rows as $key => $val) {
	    if(strstr($rows[0],'@')) {
		$tmp = explode($val,':');
		$parsed_params[$key]['mail_address'] = $tmp[0];
		$parsed_params[$key]['ip_address'] = $tmp[1];
		$parsed_params[$key]['country_name'] = $this->_searchCountryName($tmp[1]);
	    } else {
		//$val is ip address
		$parsed_params[]['country_name'] = $this->_searchCountryName($val);
	    }
	}

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
