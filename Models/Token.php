<?php

class Token
{
	private $_id;
	private $_userId;
	private $_validTo;
	private $_value;

	public function __construct($userId, $validTo, $value, $id = NULL){
			$this->_id = $id;
			$this->_userId = $userId;
			$this->_validTo = $validTo;
			$this->_value = $value;
			return $this;
		}
	public function create(){
		$sql = "INSERT INTO token (userId, validTo, value) ".
		"VALUES (?, ?, ?, ?)";
		
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("iiss",$this->_id ,$this->_userId, $this->_validTo, $this->_value);
		
		$stmt->execute();
		return TRUE;	
	}
	
	public function edit(){
		
		$sql = "UPDATE token SET  userId=?, validTo=?, value=? WHERE id = ?";
		
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("iiss", $this->_id, $this->_userId, $this->_validTo, $this->_value);
		
		$stmt->execute();
		return TRUE;	

	}
	
	public function delete(){
		
		$sql = "UPDATE token SET  userId=?, validTo=?, value=? WHERE id = ?";
		
		$stmt = DB::$db->prepare($sql);
		
		$this->_validTo = ""; //To be determined what to use as invalid token
		
		$stmt->bind_param("sssS", $this->_userId, $this->_validTo, $this->_value, $this->_id);
		
		$stmt->execute();
		return TRUE;
		
	}
	
}

?>
