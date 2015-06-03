<?php

public class TokenFactory
{
	/*
	private $_id;
	private $_userId;
	private $_validTo;
	private $_value;
	*/
	
	public static function getByUserId($id){
		$sql = "SELECT * FROM token WHERE id = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return FALSE;
		
		$obj = $result->fetch_object();
		return new Token($obj->userId,
						 $obj->validTo,
						 $obj->value,
						 $obj->id);
	}
	public static function getByValue($value){
		$sql = "SELECT * FROM token WHERE value = ?";
		$stmt = DB::$db->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if($result->num_rows == 0) return FALSE;
		
		$obj = $result->fetch_object();
		return new Token($obj->userId,
						 $obj->validTo,
						 $obj->value,
						 $obj->id);
	}
}

?>
