<?php
class UserController{	

public function build(){
	$tokVal = md5(uniqid());
	$tokTime = new DateTime();
	$tokTime->add(new DateInterval('P10D'));
	$tokTime = $tokTime->format('Y-m-d H:i:s');
	$token = new Token($userID, $tokTime, $tokVal);
	$token->create();
	return $token;
	}
}
