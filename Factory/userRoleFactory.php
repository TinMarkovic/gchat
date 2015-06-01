<?php

public class userRole
{
	private $_id;
	private $_userId;
	private $_roleId;
	private $_dateAssigned;
	private $_roomId;
	
	public function __construct($userId, $roleId, $dateAssigned, $id = NULL, $roomId = NULL){
		$this->_id = $id;
		$this->_userId = $userId;
		$this->_roleId = $roleId;
		$this->_dateAssigned = $dateAssigned;
		$this->_roomId = $roomId;
		return $this;
	}
}

?>
