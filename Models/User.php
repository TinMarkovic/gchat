<?php

class User
{
	public $_id;
	public $_username;
	public $_password;
	public $_firstName;
	public $_lastName;
	public $_email;
	public $_birthday;
	public $_status;

	public function __construct($username, $password, $firstName, $lastName, $email, $birthday, $id = NULL, $status = NULL){
			$this->_id = $id;
			$this->_username = $username;
			$this->_password = $password;
			$this->_firstName = $firstName;
			$this->_lastName = $lastName;
			$this->_email = $email;
			$this->_birthday = $birthday;
			$this->_status = $status;
			return $this;
		}
		
	public function create(){
		$sql = "INSERT INTO user (username, password, firstName, lastName, email, birthday, status) ".
		"VALUES (?, ?, ?, ?, ?, ?, ?)";
		
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("sssssss", $this->_username, $this->_password, $this->_firstName,
						  $this->_lastName, $this->_email, $this->_birthday, $this->_status);
						  
		$this->_status = "Active";
		$stmt->execute();
		return TRUE;	
	}
	
	public function edit($ajdi){
		
		$sql = "UPDATE user SET username=?,	password=?, firstName=?,
								lastName=?, email=?, birthday=?, status=?
							WHERE id = ?";

		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("ssssssss", $this->_username, $this->_password, $this->_firstName,
						  $this->_lastName, $this->_email, $this->_birthday, $this->_status, $ajdi);
		$stmt->execute();
		return TRUE;
	}
	
	public function delete(){
		$sql = "UPDATE user SET username=?,	password=?, firstName=?,
								lastName=?, email=?, birthday=?, status=?
							WHERE id = ?";
		
		$stmt = DB::$db->prepare($sql);
		
		$this->_status = "Inactive";
		
		$stmt->bind_param("ssssssss", $this->_username, $this->_password, $this->_firstName,
						  $this->_lastName, $this->_email, $this->_birthday, $this->_status, $this->_id);
		$stmt->execute();
		return TRUE;
		
	}
}
?>
