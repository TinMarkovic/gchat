<?php

class RolePermission
{
	private $_id;
	private $_dateAssigned;
	private $_roleId;
	private $_permissionId;
	
	public function __construct($roleId, $permissionId, $id = NULL, $dateAssigned = NULL){
		$this->_id = $id;
		$this->_roleId = $roleId;
		$this->_permissionId = $permissionId;
		$this->_dateAssigned = $dateAssigned;
		return $this;
	}
	
	public function create(){
		$sql = "INSERT INTO rolePermission (dateAssigned, roleId, permissionId) ".
		"VALUES (?, ?, ?)";
		
		$stmt = DB::$db->prepare($sql);
		$this->_dateAssigned = date('Y-m-d G:i:s');
		$stmt->bind_param("sii", $this->_dateAssigned ,$this->_roleId ,$this->_permissionId);
		$stmt->execute();
		return TRUE;	
	}
	//samo je create napravljen ostatak provjerit radi li kako treba i editovat
	public function edit(){
		
		$sql = "UPDATE userrole SET userId=?, roleId=?, dateAssigned=?, roomId=?
								WHERE id = ?";

		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("iisii",$this->_userId, $this->_roleId, $this->_dateAssigned, $this->_roomId, $this->_id);
		$stmt->execute();
		return TRUE;
	}
	
	public function delete(){
		$sql = "DELETE FROM userrole WHERE id = ?";
		
		$stmt = DB::$db->prepare($sql);
		
		$stmt->bind_param("i", $this->_id);
		
		$stmt->execute();
		return TRUE;
		
	}
	
}

?>
