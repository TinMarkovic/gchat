<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
require_once "Models/User.php";
require_once "Factory/UserFactory.php";
require_once "Models/Token.php";
require_once "Helpers/validate.php";

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
		
		$validator = new validate();
		$result = $validator->registerForm($this->_params);
		
		if (!($result===TRUE)) return $result;
		
		$user = new User($username, $password, $firstName, $lastName, $email, $birthday);
		$sucess = $user->create();
		if($sucess){
			echo "Registracija Uspjesna";
			return true;
		}
		return false;
	}
	
	public function login(){
		$user = $this->checkExist();
		
		if($user === false) return "User does not exist. <br>";
		
		if($user->_password != $this->_params["password"]){
			return "Invalid password <br>";
		}
		
		$userID = $user->_id;
		
		// Token creation for a logged in user
		
		$tokVal = md5(uniqid());
		$tokTime = new DateTime();
		$tokTime->add(new DateInterval('P10D'));
		$tokTime = $tokTime->format('Y-m-d H:i:s');
		

		$token = new Token($userID, $tokTime, $tokVal);
		$token->create();
		
		// Create cookie or give somehow
		
		// End token creation
		
		if (!isset($userID) || empty($userID)) return "Credentials false!<br>";
		return $userID;
	}
	
	public function edit(){
		$user = UserFactory::getById($this->_params["id"]);
		// uredba polja
		if ($this->_params["usernamme"]) {
			 $user->_username = $this->_params["username"];
		 }
		$user->edit();
		return $user;
	}
	
	public function checkExist(){
		$user = UserFactory::getByUsername($this->_params["username"]);
		return $user;
	}
}
	

?>
