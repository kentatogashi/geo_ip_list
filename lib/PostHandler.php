<?php
class PostHandler {
    private $_post = array();
    private $_params = array();
    
    public function __construct($post) {
	$this->_post = $post;
	$this->sanitize($this->_post);
	$this->_params = $this->parse($this->_post);
    }

    private function sanitize() {
	
	if(empty($this->_post)) {
	throw Exception("Input data is empty");
	}
	$this->_post = htmlspecialchars($this->_post,ENT_QUOTES,'UTF-8'); 
	# $this->_post = mysql_real_escape_string($this->_post);
    }

    private function parse($post) {
	$rows = explode("\n",$post);
	$parsed_params = array();
	foreach($rows as $key => $val) {
	    if(strstr($val,'@')) {
		$tmp = explode(':',$val);
		$parsed_params[$key]['mail_address'] = $tmp[0];
		$parsed_params[$key]['ip_address'] = $tmp[1];
		$parsed_params[$key]['country_name'] = $this->searchCountryName($tmp[1]);
	    } else {
		$parsed_params[$key]['ip_address'] = $val;
		$parsed_params[$key]['country_name'] = $this->searchCountryName($val);
	    }
	}
	return $parsed_params;
    }

    private function searchCountryName($ip_address) {
	$country_name = geoip_country_name_by_name($ip_address);
	if(empty($country_name)) $country_name = null;
	return $country_name;
    }

    public function getParams() {
	return $this->_params;
    }
}
