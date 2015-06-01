<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";

class userController{		
	
	private $_params;
	
	public function __construct($params){
		$this->_params = $params;
	}
	
	public function register(){
		extract($this->_params);
		if($this->checkExist()===TRUE){
			return "Username is taken. <br>";
		}
		$sql = "INSERT INTO user (username, password, firstName, lastName, email) ".
		"VALUES ('$username', '$password', '$firstName', ".
		"'$lastName', '$email')";
		DB::$db->query($sql);
		return TRUE;
	}
	
	public function login(){
		extract($this->_params);
		$sql = "SELECT ID FROM user WHERE username = '$username' AND password = '$password'";
		$result = DB::$db->toArray($sql);
		$userID = $result->ID;
		if (!isset($userID) || empty($userID)) return "Credentials false!<br>";
		return $userID;
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
