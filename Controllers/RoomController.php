<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
require_once "Models/Room.php";

require_once "Helpers/validate.php";
require_once "Factory/RoomFactory.php";

class RoomController{		
	
	private $_params;
	
	public function __construct($params){
		$this->_params = $params;
	}
	
	public function make(){
		
		
		$dataset["name"] = $this->_params["name"];
		
		if (isset($this->_params["password"])) {
			$dataset["password"] = $this->_params["password"];
		} else {
			$this->_params["password"] = NULL;
		}
		
		if (isset($this->_params["description"])) {
			$dataset["description"] = $this->_params["description"];
		} else {
			$this->_params["description"] = NULL;
		}
		
		if (isset($this->_params["type"])) {
			$dataset["type"] = $this->_params["type"];
		} else {
			$this->_params["type"] = "Public";
		}
		
		// Validirati unose iz $params
		$validator = new validate();
		$result = $validator->roomForm($dataset);
		
		if (!($result === true)) {
			return $result;
		}
		
		
		// Provjeriti da soba već ne postoji
		 
		
		if(!($this->checkExist()===false)){
			return "Room name is taken. <br>";
		}
		
		// Napraviti dodjelu $creator varijable
		$creator = 1;
		
		$room = new Room($this->_params["type"], NULL, $this->_params["password"],
						 $this->_params["name"], $this->_params["description"],
						 0 , 50, $creator);
		
		$sucess = $room->create();
		
		if($sucess){
			echo "Stvaranje sobe uspjesno";
			return true;
		}
		return false;
	}

	public function checkExist(){
		$room = RoomFactory::getByRoomName($this->_params["name"]);
		return $room;
	}

}
?>
