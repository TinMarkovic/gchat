<?php

class user
{
	private $username;
	private $password;
	private $firstName;
	private $lastName;
	private $email;
	
	public function __construct($data)
	{	
		//print_r($data);
		
		DB::$db->clean($data);
		extract($data);
		$this->username = $username;
		$this->password = $password;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		
		return $this;
		
	}
	
	//prima usera iz reg.html forme preko post metode i dodaje u bazu
	public function addUserToDB(){
		$sql = "INSERT INTO user (username, password, firstName, lastName, email) ".
		"VALUES ('$this->username', '$this->password', '$this->firstName', ".
		"'$this->lastName', '$this->email')";
		//provjera dali je username zauzet
		if($this->checkExist()==TRUE){
			DB::$db->query($sql);
			return TRUE;
		}
		echo "username is taken";
		return FALSE;
			
	}
	//provjerava postoji li isti username u bazi 
	public function checkExist(){
		$sql = "SELECT * FROM user WHERE username = '$this->username'";
		$result = DB::$db->query($sql);
		if($result->num_rows > 0){
			return FALSE;
		} else {
			return TRUE;
		}
	}
	// prima ID usera kao parametar i vraca podatke o user sa tim ID-om (logicno)
	public function getByID($id){
		$sql = "SELECT * FROM user WHERE ID = '$id'";
		
		if(DB::$db->query($sql)){
		$result = DB::$db->toArray($sql);
		return $result;
		}
		return FALSE;
	}
	
	public function ispisiIme()
	{
		return $this->firstName;
	}
}
?>
