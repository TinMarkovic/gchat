<?php

require_once "db.php";

class token {
	public $userID, $value;
	
	// Stvara novi token za korisnika čiji ID predamo
	function create($userIdentification) {
		$this->userID = $userIdentification;
		$this->value = uniqid();
		$sql = "INSERT INTO token (userID, value, created, validTo) ".
				"VALUES ($this->userID, '$this->value', ".
				"NOW(), DATE_ADD(NOW(),INTERVAL 12 HOUR))";
		DB::$db->query($sql);
		setcookie('Gchat', $this->value, time()+60*60*12);
		return $this->value;
	}
	
	// Provjerava je li trenutni korisnik ima pravi cookie, i je li on valjan
	function check() {
		if(!isset($_COOKIE['Gchat']))
			return false;
		$userToken = $_COOKIE['Gchat'];
		
		$userToken = DB::$db->clean($userToken);
		
		$sql = "SELECT userID FROM token WHERE value = '$userToken' AND (NOW() < validTo)";
		$result = DB::$db->query($sql);
		if (mysqli_num_rows($result) == 0)
			return false;
		$x = $result->fetch_object();
		$this->userID = $x->userID;
		return true;
	}
	
	// Vraća koji je korisnik logiran
	function getUserID() {
		return $this->userID;
	}
	
	// Uklanja određeni token iz baze, gaseći korisnikov login
	function remove() {
		if(!isset($_COOKIE['Gchat']))
			return false;
		$token = $_COOKIE['Gchat'];
		
		$token = DB::$db->clean($token);
		
		$sql = "UPDATE token SET validTo='null' WHERE value = '$token'";
		$result = DB::$db->query($sql);	

		setcookie("Gchat", "", time()-60);
		return true;
	}
}

?>
