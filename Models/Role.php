<?php

class Role
{
	private $_id;
	private $name;
	private $status;
	
	public function __construct($name, $id = NULL, $status = NULL){
			$this->_id = $id;
			$this->_name = $name;
			$this->_status = $status;
			return $this;
		}
		
	public function create(){
		$sql = "INSERT INTO role (name, status) ".
		"VALUES (?, ?)";
		
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("ss", $this->_name, $this->_status);
						  
		$this->_status = "Active";
		$stmt->execute();
		return TRUE;	
	}
	
	public function edit(){
		
		$sql = "UPDATE role SET name = ?
							WHERE id = ?";

		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("si",$this->_name, $this->_id);
		$stmt->execute();
		return TRUE;
	}
	
	public function delete(){
		$sql = "UPDATE role SET name = ?, status = ?
							WHERE id = ?";
		
		$stmt = DB::$db->prepare($sql);
		
		$stmt->bind_param("ssi",$this->_name,$this->_status, $this->_id);
		$this->_status = "Inactive";
		$stmt->execute();
		return TRUE;
		
	}
	
}

?>
