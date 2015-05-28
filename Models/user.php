<?php

class User
{
	private $_id;
	private $_username;
	private $_password;
	private $_firstName;
	private $_lastName;
	private $_email;
	private $_birthday;
	private $_status;

	public function __construct($username, $password, $firstName, $lastName, $email, $birthday){
			$this->_username = $username;
			$this->_password = $password;
			$this->_firstName = $firstName;
			$this->_lastName = $lastName;
			$this->_email = $email;
			$this->_birthday = $birthday;
			return $this;
		}
	
	public static function fullUser ($id, $username, $password, $firstName, $lastName, $email, $birthday, $status){
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
}
?>
