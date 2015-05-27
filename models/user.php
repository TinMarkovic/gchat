<?php

class user
{
	private $username;
	private $password;
	private $firstName;
	private $lastName;
	private $email;
	
	public static function fromArray($args){
		extract($args);
		$user=new self();
		$user->$username=$username;
		$user->$password=$password;
		$user->$firstName=$firstName;
		$user->$lastName=$lastName;
		$user->$email=$email;
		return $user; 
	}

}
?>
