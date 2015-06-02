<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
include "Models/User.php";
include "Factory/UserFactory.php";

class UserController{		
	
	private $_params;
	
	public function __construct($params){
		$this->_params = $params;
	}
	
	public function register(){
		extract($this->_params);
		if($this->checkExist()===TRUE){
			return "Username is taken. <br>";
		}
		$user = new User($username, $password, $firstName, $lastName, $email, $birthday);
		$sucess = $user->create();
		if($sucess){
			echo "Registracija Uspjesna";
			return true;
		}
		return false;
	}
	
	public function login(){
		extract($this->_params);
		$sql = "SELECT ID FROM user WHERE username = '$username' AND password = '$password'";
		$result = DB::$db->toArray($sql);
		$userID = $result->ID;
		if (!isset($userID) || empty($userID)) return "Credentials false!<br>";
		return $userID;
	}
	
	public function edit(){
		$user = UserFactory::getById($this->_params["id"]);
		// uredba polja
		if ($this->_params["usernamme"]) $user->_username = $this->_params["username"];
		$user->edit();
		return $user;
	}
	
	public function checkExist(){
		$username = $this->_params['username'];
		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = DB::$db->query($sql);
		if($result->num_rows == 0){
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
	

?>
