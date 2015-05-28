<?php

public class Role
{
	private $_id;
	private $name;
	private $status;
	
	public function __construct($id = NULL, $name, $status = NULL){
			$this->_id = $id;
			$this->_name = $name;
			$this->_status = $status;
			return $this;
		}
}

?>
