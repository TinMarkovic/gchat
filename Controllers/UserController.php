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
		if(!($this->checkExist()===false)){
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
		$user = UserFactory::getByUsername($this->_params["username"]);
		
		if($user->_password != $this->_params["password"]){
			return "Invalid password <br>";
		}
		
		$userID = $user->_id;
		
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
		$user = UserFactory::getByUsername($this->_params["username"]);
		return $user;
	}
}
	

?>
