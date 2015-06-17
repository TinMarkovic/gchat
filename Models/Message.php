<?php

class Message
{
	public $_id;
	public $_userId;
	public $_roomId;
	public $_content;
	public $_dateTime;

	public function __construct($userId, $roomId, $content, $dateTime = NULL, $id = NULL){
			$this->_id = $id;
			$this->_userId = $userId;
			$this->_roomId = $roomId;
			$this->_content = $content;
			$this->_dateTime = $dateTime;
			return $this;
		}
		
	public function create(){
		$sql = "INSERT INTO message (userId, roomId, content, dateTime) ".
		"VALUES (?, ?, ?, ?)";
		
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("iiss", $this->_userId, $this->_roomId, $this->_content, $this->_dateTime);

		$stmt->execute();
		return TRUE;	
	}
	
	public function edit(){
		
		//~ $sql = "UPDATE message SET username=?,	password=?, firstName=?,
								//~ lastName=?, email=?, birthday=?, status=?
							//~ WHERE id = ?";
		//~ 
		//~ $stmt = DB::$db->prepare($sql);
		//~ $stmt->bind_param("ssssssss", $this->_username, $this->_password, $this->_firstName,
						  //~ $this->_lastName, $this->_email, $this->_birthday, $this->_status, $this->_id);
		//~ $stmt->execute();
		//~ return TRUE;
	}
	
	public function delete(){
		$sql = "DELETE FROM message
				WHERE id=?;";
		
		$stmt = DB::$db->prepare($sql);
		
		$stmt->bind_param("i", $this->_id);
		
		$stmt->execute();
		return TRUE;
		
	}
	
}
?>
