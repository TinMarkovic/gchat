<?php

class Permission
{
	public $_id;
	public $_permission;
	public $_type;
	public $_status;
	
	public function __construct($permission,$type, $status = NULL, $id = NULL){
			$this->_id = $id;
			$this->_permission = $permission;
			$this->_type = $type;
			$this->_status = $status;
			return $this;
		}
		
	// treba jos dodati kako ubaciti ID od kreatora
	public function create(){
		$sql = "INSERT INTO permission (permission, type, status) ".
		"VALUES (?, ?, ?)";
		
		$stmt = DB::$db->prepare($sql);
		$this->_status = "Active";
		$stmt->bind_param("sss", $this->_permission, $this->_type, $this->_status);
						  
		$stmt->execute();
		return TRUE;	
	}
	
	public function edit(){
		
		$sql = "UPDATE permission SET permission=?, type=?,	status=? WHERE id = ?";

		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("sssi", $this->_permission, $this->_type, $this->_status, $this->_id);
		$stmt->execute();
		return TRUE;
	}
	
	public function delete(){
		$sql = "UPDATE permission SET permission=?, type=?,	status=? WHERE id = ?";
		
		$stmt = DB::$db->prepare($sql);
		
		$this->_status = "Inactive";
		
		$stmt->bind_param("sssi", $this->_permission, $this->_type, $this->_status, $this->_id);
		$stmt->execute();
		return TRUE;
		
	}
	
}

?>
