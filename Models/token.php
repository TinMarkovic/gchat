<?php

public class Token
{
	private $_id;
	private $_userId;
	private $_validTo;
	private $_value;

	public function __construct($userId, $validTo, $value, $id = NULL){
			$this->_id = $id;
			$this->_userId = $userId;
			$this->_validTo = $validTo;
			$this->_value = $value;
			return $this;
		}	
}

?>
