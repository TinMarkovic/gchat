<?php

public class Room
{
	private $_id;
	private $_type;
	private $_status;
	private $_password;
	private $_name;
	private $_description;
	private $_userCount;
	private $_userMax;
	private $_creatorId;
	
	public function __construct($id = NULL, $type, $status, $password, $name, $description, $userCount, $userMax, $creatorId = NULL){
			$this->_id = $id;
			$this->_type = $type;
			$this->_status = $status;
			$this->_password = $password;
			$this->_name = $name;
			$this->_description = $description;
			$this->_userCount = $userCount;
			$this->_userMax = $userMax;
			$this->_creatorId = $creatorId;
			return $this;
		}
}

?>
