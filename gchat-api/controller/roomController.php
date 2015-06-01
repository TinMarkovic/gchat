<?php

class roomController {
	private $_params;
	function __construct($params){
		$this->_params = $params;
	}
	function test(){
		$x = json_encode($this->_params);
		return $x;
	}
}
?>
