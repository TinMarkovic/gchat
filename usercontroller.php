<?php
class userController
{		
		public function register($data){
			extract($data);
			$sql = "INSERT INTO user (username, password, firstName, lastName, email) ".
			"VALUES ('$username', '$password', '$firstName', ".
			"'$lastName', '$email')";
			//provjera dali je username zauzet
			
			if($this->checkExist($username)==TRUE){
				DB::$db->query($sql);
				return TRUE;
			}
			echo "username is taken";
			return FALSE; 
			
			
		}
		
		
		public function login(){
			
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
