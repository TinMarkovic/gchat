<?php

class userController {
	private $_params;
	function __construct($params){
		$this->_params = $params;
	}
	function create(){
		//kreiranje usera
		echo "Kreiran user";
	}
}
?>
