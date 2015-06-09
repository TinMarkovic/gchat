<?php
require_once "DAL/db.php";
require_once "DAL/dbInfo.php";
require_once "Models/Permission.php";
require_once "Factory/PermissionFactory.php";
require_once "Helpers/validate.php";

class PermissionController{		
	
	private $_params;
	
	public function __construct($params){
		$this->_params = $params;
	}
	
	public function add(){
		extract($this->_params);
		if(!($this->checkExist()===false)){
			return "Permission already exists <br>";
		}
		//mozda treba validacija
		$permission = new Permission($permission, $type);
		$sucess = $permission->create();
		if($sucess){
			echo "Dodavanje permisije uspjesno";
			return true;
		}
		return false;
	}
	
	public function disable(){
		extract($this->_params);
		if(($this->checkExist()===false)){
			return "Permission doesn't exist <br>";
		}
		$permission = PermissionFactory::getById($this->_params["id"]);
		$permission->delete();
		
	}
	
	public function activate(){
		extract($this->_params);
		if(($this->checkExist()===false)){
			return "Permission doesn't exist <br>";
		}
		$permission = PermissionFactory::getById($this->_params["id"]);
		$permission->_status = "Active";
		$permission->edit();
		
	}
	//napraviti modify...
	
	public function checkExist(){
		if(!isset($this->_params["id"])){
		$permission = PermissionFactory::getByPermission($this->_params["permission"]);
		return $permission;
		}
		$permission = PermissionFactory::getById($this->_params["id"]);
		return $permission;
	}
}
	

?>
