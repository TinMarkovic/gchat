<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
require_once "Models/User.php";
require_once "Models/UserRole.php";
require_once "Factory/UserRoleFactory.php";
require_once "Models/Token.php";
require_once "Factory/UserFactory.php";
require_once "Controllers/RoleController.php";
require_once "Helpers/validate.php";
require_once "Factory/TokenFactory.php";
require_once "Models/User.php";
require_once "Models/Room.php";
require_once "Models/Message.php";
require_once "Factory/MessageFactory.php";

class MessageController{
	
	private $_params;
	
	public function __construct($params){
		
		$this->_params = $params;
		
	}
	
	public function postMessage(){
		$user = UserFactory::getByToken($this->_params["cookie"]["token"]);
		$userId = $user->_id;
		$dateTime = new DateTime();
		$dateTime = $dateTime->format('Y-m-d H:i:s');
		$content = $this->_params["content"];
		$roomId = $this->_params["realm"];
		
		$message = new Message($userId, $roomId, $content, $dateTime);
		print_r($message);
		$success = $message->create();
		return "$success";
	}
	
	public function displayMessages(){
			$msgList = MessageFactory::getListByRoom($this->_params["realm"]);
			return $msgList;
	}
	
}
