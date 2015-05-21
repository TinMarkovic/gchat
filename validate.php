<?php

class validate {
	
	
	function length($key, $entry, $minLength, $maxLength){
		if ((strlen($entry) < $minLength)||(strlen($entry) > $maxLength)) 
			if (strlen($entry) < $minLength) return("Your $key has ". strlen($entry)." signs, it should have more than $minLength .<br>");
			if (strlen($entry) > $maxLength) return("Your $key has ". strlen($entry)." signs, it should have less than $maxLength .<br>");
		else
			return true;
		return false;
	}
	
	
	function email($entry){
		if (strpos($entry ,'@') !== false)
			return true;
		return "Your email needs to have an '@' sign. <br>";
	}
	
	
	function password($entry){
		$uppercase = preg_match('@[A-Z]@', $entry);
		$lowercase = preg_match('@[a-z]@', $entry);
		$number    = preg_match('@[0-9]@', $entry);

		if (!$uppercase || !$lowercase || !$number) {
			if (!$uppercase) $error = $error . "Your password lacks an uppercase sign. <br> ";
			if (!$lowercase) $error = $error . "Your password lacks a lowercase sign. <br> ";
			if (!$number)	 $error = $error . "Your password lacks a number. <br> ";
		} else {
			return true;
		}
		return $error;
	}
	
	
	function registerForm($dataset){
		$error = "";
		foreach($dataset as $key => $entry){
			switch($key){
				case "username":
					$success = $this->length($key,$entry,4,20);
					if ($success !== TRUE) {
						$error = $error . $success;
					} 
					break;
				case "password":
					$success = $this->length($key,$entry,6,60);
					if ($success !== TRUE) {
						$error = $error . $success;
					} 
					$success = $this->password($entry);
					if ($success !== TRUE) {
						$error = $error . $success;
					} 
					break;
				case "firstName":
					$success = $this->length("first name",$entry,4,20);
					if ($success !== TRUE) {
						$error = $error . $success;
					} 
					break;
				case "lastName":
					$success = $this->length("last name",$entry,4,20);
					if ($success !== TRUE) {
						$error = $error . $success;
					} 
					break;
				case "email":
					$success = $this->email($entry);
					if ($success !== TRUE) {
						$error = $error . $success;
					} 
					break;
			} // end switch
		} // end foreach
		
		
		if ($error == "")
			return true;
		else
			return $error;
	}
}
