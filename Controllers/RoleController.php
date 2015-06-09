<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
require_once "Models/Role.php";
require_once "Models/RolePermission.php";
require_once "Factory/RoleFactory.php";
require_once "Controllers/PermissionController.php";
require_once "Helpers/validate.php";

class RoleController{		
	
	private $_params;
	
	public function __construct($params){
		$this->_params = $params;
	}
	
	public function add(){
		extract($this->_params);
		if(!($this->checkExist()===false)){
			return "Role already exists <br>";
		}
		//mozda treba validacija
		$role = new Role($name);
		$sucess = $role->create();
		if($sucess){
			echo "Dodavanje role uspjesno";
			return true;
		}
		return false;
	}
	
	public function disable(){
		extract($this->_params);
		if(($this->checkExist()===false)){
			return "Role doesn't exist <br>";
		}
		$role = RoleFactory::getById($this->_params["id"]);
		$role->delete();
		
	}
	
	public function activate(){
		extract($this->_params);
		if(($this->checkExist()===false)){
			return "Role doesn't exist <br>";
		}
		$role = RoleFactory::getById($this->_params["id"]);
		$role->_status = "Active";
		$role->edit();
		
	}
	//napraviti modify...
	
	
	public function checkExist(){
		if(!isset($this->_params["id"])){
		$role = RoleFactory::getByName($this->_params["name"]);
		return $role;
		}
		$role = RoleFactory::getById($this->_params["id"]);
		return $role;
	}

//-------------------------------Permissions section down bellow----------------------------------------

	public function addPermission(){
		extract($this->_params);
		if(($this->checkExist()===false)){
			return "Role doesn't exist <br>";
		}
		$PC = new PermissionController(array("id"=>$this->_params["permissionId"]));
		if(($PC->checkExist()===false)){
			return "Permission doesn't exist <br>";
		}
		
		//napraviti provjeru ako se dodjeli roli vise permisija odjednom
		$RP = new RolePermission($this->_params["id"], $this->_params["permissionId"]);
		$RP->create();
	}
	
}

?>
