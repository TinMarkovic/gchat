<?php

class validate {
	// Provjerava dužinu i vraća je li odgovara uvjetima
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
			switch($dataset){
				case "username":
					$success = length($key,$entry,4,20);
					if (!$success) {
						$error = $error . $success;
					} 
					break;
				case "password":
					$success = length($key,$entry,6,60);
					if (!$success) {
						$error = $error . $success;
					} 
					$success = password($entry);
					if (!$success) {
						$error = $error . $success;
					} 
					break;
				case "firstName":
					$success = length("first name",$entry,0,20);
					if (!$success) {
						$error = $error . $success;
					} 
					break;
				case "lastName":
					$success = length("last name",$entry,0,20);
					if (!$success) {
						$error = $error . $success;
					} 
					break;
				case "email":
					$success = length($key,$entry,4,20);
					if (!$success) {
						$error = $error . $success;
					} 
					$success = email($entry);
					if (!$success) {
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
