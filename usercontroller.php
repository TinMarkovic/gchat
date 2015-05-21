<?php
class userController
{		
		public function register($data){
			
			extract($data);
			if($this->checkExist($username)===TRUE){
				return "Username is taken. <br>";
			}
			$sql = "INSERT INTO user (username, password, firstName, lastName, email) ".
			"VALUES ('$username', '$password', '$firstName', ".
			"'$lastName', '$email')";
			DB::$db->query($sql);
			return TRUE;
		}
		
		
		public function login($data){
			extract($data);
			$sql = "SELECT ID FROM user WHERE username = '$username' AND password = '$password'";
			$result = DB::$db->toArray($sql);
			$userID = $result->ID;
			if (!isset($userID) || empty($userID)) return "Credentials false!<br>";
			return $userID;
		}
		
		public function checkExist($username){
			$sql = "SELECT * FROM user WHERE username = '$username'";
			$result = DB::$db->query($sql);
			if($result->num_rows > 0){
				return FALSE;
			} else {
				return TRUE;
			}
		}
}
	

?>
