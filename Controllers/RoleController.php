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
		
		
		$role = $this->checkExist();
		if($role === false){
			return "Role doesn't exist <br>";
		}
		
		$PC = new PermissionController(array("id"=>$this->_params["permissionId"], "permission"=>$this->_params["permissionName"]));
		$permission = $PC->checkExist();
		if($permission===false){
			return "Permission doesn't exist <br>";
		}
		
		$RP = new RolePermission($role->_id, $permission->_id);
		
		$check = $RP->findInDB();
		
		if($check != false){
			return("This role already has this permission. <br>");
		}
		
		$RP->create();
		return true;
	}
	
}

?>
