<?php
class PostHandler {
    private $_post;
    private $_params;

    public function __construct() {
	if(!is_null($this->_post)) {
	    $this->sanitize($this->_post);
	    $this->_params = $this->parse($this->_post);
	}
    }

    public function setParams($params) {
	$this->_post = $params;
	$this->__construct();
    }

    public function getParams() {
	return $this->_params;
    }

    private function sanitize() {
	if(empty($this->_post)) {
	    trigger_error("Input data is empty");exit;
	}
	$this->_post = htmlspecialchars($this->_post,ENT_QUOTES,'UTF-8'); 
    }

    private function parse($post) {
	$rows = explode("\n",$post);
	$data = array();
	foreach($rows as $k => $v) {
	    if(strstr($v,'@')) {
		list($mail,$ip) = explode(':',$v);
		$data[$k]['mail'] = $mail;
	    } else {
		$ip = $v;
	    }
		$data[$k]['ip'] = $ip;
		$data[$k]['country'] = $this->searchCountry($ip);
	}
	return $data;
    }

    private function searchCountry($ip) {
	$country = geoip_country_name_by_name($ip);
	return $country;
    }

}
